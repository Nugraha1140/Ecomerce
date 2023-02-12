<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
    public  function getRouteKeyName(){
        return 'slug';
    }

}
