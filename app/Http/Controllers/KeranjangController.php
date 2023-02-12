<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjangs = Keranjang::where('status', 'keranjang')->with('produk', 'user')->get();
        return view('template.user.keranjang', compact('keranjangs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks = Produk::all();
        $users = User::all();
        $keranjangs = Keranjang::where('status', 'keranjang');
        return view('template.user.detailproduk', compact('produks', 'users', 'keranjangs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
        ]);

        $cek_keranjangs = Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->first();

        if (!empty($cek_keranjangs)) {
            $keranjangs = Keranjang::where('user_id', $request->user_id)->where('produk_id', $request->produk_id)->first();
            $keranjangs->jumlah += $request->jumlah;
            $diskon = (($keranjangs->produk->diskon / 100) * $keranjangs->produk->harga);
            $harga = ($keranjangs->produk->harga * $request->jumlah) - $diskon;
            $keranjangs->total_harga += $harga;
            $keranjangs->save();
            return redirect()
                ->route('keranjang.index')->with('success', 'Data has been added');
        } else {
            $keranjangs = new Keranjang();
            $keranjangs->user_id = $request->user_id;
            $keranjangs->produk_id = $request->produk_id;
            $keranjangs->jumlah = $request->jumlah;
            $diskon = (($keranjangs->produk->diskon / 100) * $keranjangs->produk->harga);
            $keranjangs->total_harga = ($keranjangs->produk->harga * $request->jumlah) - $diskon;
            $keranjangs->save();
            return redirect()
                ->route('keranjang.index')->with('success', 'Data has been added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keranjangs = Keranjang::findOrFail($id);
        $produks = Produk::all();
        $users = User::all();
        return view('admin.keranjang.edit', compact('keranjangs', 'produks', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'jumlah' => 'required',
        ]);

        $keranjangs = Keranjang::findOrFail($id);
        $keranjangs->user_id = $request->user_id;
        $keranjangs->produk_id = $request->produk_id;
        $keranjangs->jumlah = $request->jumlah;
        $diskon = (($keranjangs->produk->diskon / 100) * $keranjangs->produk->harga);
        $keranjangs->total_harga = ($keranjangs->produk->harga * $request->jumlah) - $diskon;
        $keranjangs->save();
        return redirect()
            ->route('keranjang.index')->with('success', 'Data has been edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjangs = Keranjang::findOrFail($id);
        $keranjangs->delete();
        return redirect()
            ->route('keranjang.index')->with('success', 'Data has been deleted');
}
}
