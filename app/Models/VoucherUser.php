<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
