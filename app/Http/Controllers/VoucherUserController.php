<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherUser;
use App\Models\Payment;
use Illuminate\Http\Request;

class VoucherUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::where('label', 'berbayar')->where('status', 'aktif')->get();
        $users = User::where('role', 'costumer')->get();
        $payments= Payment::all();
        $voucher_users = VoucherUser::with('user', 'voucher')->latest()->get();
        return view('admin.voucheruser.index', compact('voucher_users','vouchers', 'users','payments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $vouchers = Voucher::where('label', 'berbayar')->where('status', 'aktif')->get();
        // // $vouchers = $vouchers = Voucher::where('status', 'aktif')->get();
        // $users = User::where('role', 'costumer')->get();
        // return view('admin.voucher_user.create', compact('vouchers', 'users'));

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
            'voucher_id' => 'required',
            'payment_id' => 'required',
        ]);

        $voucher_users = new VoucherUser();
        $voucher_users->user_id = $request->user_id;
        $voucher_users->voucher_id = $request->voucher_id;
        $voucher_users->payment_id = $request->payment_id;

        // saldo
        // $users = User::findOrFail($voucher_users->user_id);
        // if ($voucher_users->metode_pembayaran == 'gakuniq wallet') {
        //     if ($users->saldo < $voucher_users->voucher->harga) {
        //         return redirect()
        //             ->route('voucher_user.create')->with('toast_error', 'Saldo Kurang');
        //     } else {
        //         $users->saldo -= $voucher_users->voucher->harga;
        //     }
        //     $users->save();
        // }

        $voucher_users->save();
        return redirect()
            ->route('voucheruser.index')->with('toast_success', 'Data has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VoucherUser  $voucher_user
     * @return \Illuminate\Http\Response
     */
    public function show(VoucherUser $voucher_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoucherUser  $voucher_user
     * @return \Illuminate\Http\Response
     */
    public function edit(VoucherUser $voucher_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoucherUser  $voucher_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoucherUser $voucher_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoucherUser  $voucher_user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher_users = VoucherUser::findOrFail($id);
        $voucher_users->delete();
        return redirect()
            ->route('voucher_user.index')->with('toast_success', 'Data has been deleted');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Dihapus!.',
        // ]);

    }
}
