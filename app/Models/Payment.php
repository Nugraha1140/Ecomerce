<?php

namespace App\Models;
use App\Models\Transaksi;
use App\Models\VoucherUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function voucher_user()
    {
        return $this->hasMany(VoucherUser::class);
    }
}
