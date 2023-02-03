<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Image;
use App\Models\User;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function cartuser(Request $request)
    {
        $produks = Produk::all();
        $users = User::where('role', 'costumer')->get();
        $keranjangs = Keranjang::where('status', 'keranjang')->with('produk', 'user')->latest()->get();
        return view('template.user.keranjang', compact('keranjangs','produks','users',));
    }
    public function homeuser(Request $request)
    {
        $produk = Produk::all();
        $images = Image::all();
        $kategoris = Kategori::all();
        return view('template.user.home', compact('produk','kategoris','images'));
    }
    public function produkuser(Request $request)
    {
        $produk = Produk::all();
        $images = Image::all();
        $kategoris = Kategori::all();
        return view('template.user.produk', compact('produk','kategoris','images'));
    }

    public function produkdetail($id)
    {
        // $pro = $request->all();
        $produk = Produk::findOrFail($id);
        $images = Image::all();
        // $images = Image::find(1);
        // $kategoris = Kategori::all();
        // if($pro){
        //     $produk = Produk::where('kategori_id', $pro)->get();
        // }
        return view('template.user.detailproduk', compact('produk', 'images'));
    }
}
