<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkategoris = subKategori::with('kategori')->latest()->get();
        $kategoris = Kategori::all();
        return view('admin.subkategori.index', compact('subkategoris','kategoris'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategoris = Kategori::all();
        // return view('admin.subkategori.index', compact('kategoris'));
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
            'kategori_id' => 'required',
            'name' => 'required',
        ]);

        $subkategoris = new subKategori();
        $subkategoris->kategori_id = $request->kategori_id;
        $subkategoris->name = $request->name;
        $subkategoris->save();
        return redirect()
            ->route('subkategori.index')->with('success', 'Data has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::all();
        $subkategoris = subKategori::findOrFail($id);
        return view('admin.subkategori.edit', compact('kategoris', 'subkategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
        ]);

        $subkategoris = subKategori::findOrFail($id);
        $subkategoris->kategori_id = $request->kategori_id;
        $subkategoris->name = $request->name;
        $subkategoris->save();
        return redirect()
            ->route('subkategori.index')->with('success', 'Data has been edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subkategoris = subKategori::findOrFail($id);
        $subkategoris->delete();
        return redirect()
            ->route('subkategori.index')->with('success', 'Data has been deleted');

    }
    public function getSubKategori($id)
    {
        $sub_kategoris = SubKategori::where('kategori_id', $id)->get();
        return response()->json($sub_kategoris);
    }
}
