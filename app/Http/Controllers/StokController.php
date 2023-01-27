<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Produk;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        $stok = Stok::with('produk')->latest()->get();
        return view('admin.stok.index', compact('produk'), ['stok' => $stok
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            'produk_id' => 'required',
            'jumlah' => 'required',
        ]);

        $stok = new Stok();
        $stok->produk_id = $request->produk_id;
        $stok->jumlah = $request->jumlah;
        $stok->save();
          $produk = Produk::findOrFail($request->produk_id);
          $produk->stok += $request->jumlah;
          $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stok = Stok::findOrFail($id);
        $stok->delete();
        return redirect()->route('stok.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
