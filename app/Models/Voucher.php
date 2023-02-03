<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\VoucherUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function transaksi()
    // {
    //     return $this->hasMany(Transaksi::class);
    // }

    // public function voucher_user()
    // {
    //     return $this->hasMany(VoucherUser::class);
    // }
}
