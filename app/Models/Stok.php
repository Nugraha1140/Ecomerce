<?php

namespace App\Models;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
