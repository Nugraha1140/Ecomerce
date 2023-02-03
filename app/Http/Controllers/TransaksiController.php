<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Payment;
use App\Models\Produk;
use Illuminate\Http\Request;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'costumer')->get();
        $keranjangs = Keranjang::where('status', 'keranjang')->get();
        $payments = Payment::all();
        $transaksis = Transaksi::with('keranjang','user','payment')
        ->latest()
        ->get();
        return view('admin.transaksi.index', compact('transaksis','payments','users','keranjangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $payments = Payment::all();
        // $users = User::where('role', 'costumer')->get();
        // $keranjangs = Keranjang::where('status', 'keranjang')->get();
        // return view('admin.transaksi.create', compact('keranjangs', 'users','payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'notlp' => 'required',
            'alamat' => 'required',
            'keranjang_id' => 'required',
            'payment_id' => 'required',
            'kode_transaksi' => 'unique:transaksis',
        ]);

        $transaksis = new Transaksi();
        $kode_transaksis = DB::table('transaksis')->select(DB::raw('MAX(RIGHT(kode_transaksi,3)) as kode'));
        if ($kode_transaksis->count() > 0) {
            foreach ($kode_transaksis->get() as $kode_transaksi) {
                $x = ((int) $kode_transaksi->kode) + 1;
                $kode = sprintf('%03s', $x);
            }
        } else {
            $kode = '001';
        }
        $transaksis->kode_transaksi = 'TECH-' . $kode .date('dmy')  ;
        $transaksis->user_id = $request->user_id;
        $transaksis->notlp = $request->notlp;
        $transaksis->alamat = $request->alamat;
        $transaksis->keranjang_id = $request->keranjang_id;
        $transaksis->produk_id = $transaksis->keranjang->produk_id;
        $transaksis->jumlah = $transaksis->keranjang->jumlah;
        $transaksis->payment_id = $request->payment_id;
        $transaksis->tanggal_pemesanan = now()->format('Y-m-d H:i:s');
        $transaksis->total_harga = $transaksis->keranjang->total_harga ;

         // stok produk
         $produks = Produk::findOrFail($transaksis->keranjang->produk_id);
         if ($produks->stok < $transaksis->keranjang->jumlah) {
             return redirect()
                 ->route('transaksi.create')
                 ->with('toast_error', 'Stok Kurang');
         } else {
             $produks->stok -= $transaksis->keranjang->jumlah;
         }
         $produks->save();

         $keranjangs = keranjang::findOrFail($transaksis->keranjang_id);
         $keranjangs->status = 'checkout';
         $keranjangs->save();

         $transaksis->save();
         return redirect()
            ->route('transaksi.index')
            ->with('toast_success', 'Data has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksis = Transaksi::findOrFail($id);
        // $users = User::all();
        // $keranjangs = Keranjang::all();
        return view('admin.transaksi.show', compact('transaksis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $transaksis = Transaksi::findOrFail($id);
        $keranjangs = Keranjang::all();
        $payments = Payment::all();
        return view('admin.transaksi.edit', compact('keranjangs', 'transaksis', 'payments', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksis = Transaksi::findOrFail($id);

        //validasi
        $rules = [
            'keranjang_id' => 'required',
            'payment_id' => 'required',
            'notlp' => 'required',
            'alamat' => 'required',
        ];

        if ($request->kode_transaksi != $transaksis->kode_transaksi) {
            $rules['kode_transaksi'] = 'unique:transaksis';
        }
        $validasiData = $request->validate($rules);

        $transaksis->kode_transaksi = $request->kode_transaksi;
        $transaksis->user_id = $request->user_id;
        $transaksis->notlp = $request->notlp;
        $transaksis->alamat = $request->alamat;
        $transaksis->keranjang_id = $request->keranjang_id;
        $transaksis->payment_id = $request->payment_id;
        $transaksis->tanggal_pemesanan = now()->format('D-m-y H:i:s');
        $transaksis->total_harga = $transaksis->keranjang->total_harga;
        $transaksis->save();
        return redirect()
            ->route('transaksi.index')
            ->with('toast_success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksis = Transaksi::findOrFail($id);
        $transaksis->delete();
        return redirect()
            ->route('transaksi.index')->with('success', 'Data has been deleted');
    }
}
