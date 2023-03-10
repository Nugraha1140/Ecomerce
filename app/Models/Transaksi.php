<?php

namespace App\Models;
use App\Models\User;
use App\Models\Keranjang;
use App\Models\Payment;
use App\Models\Voucher;
use App\Models\VoucherUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    // public function voucher()
    // {
    //     return $this->belongsTo(Voucher::class);
    // }

    // public function voucher_user()
    // {
    //     return $this->belongsTo(VoucherUser::class);
    // }
}
