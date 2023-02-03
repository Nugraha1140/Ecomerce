<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::latest()->get();
        return view('admin.voucher.index',compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'kode_voucher' => 'required|unique:vouchers',
            'harga' => 'required',
            'diskon' => 'required',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
        ]);

        $vouchers = new Voucher();
        $vouchers->kode_voucher = $request->kode_voucher;
        $vouchers->harga = $request->harga;
        if ($vouchers->harga > 0) {
            $vouchers->label = 'berbayar';
        } else {
            $vouchers->label = 'gratis';
        }
        $vouchers->diskon = $request->diskon;
        $vouchers->waktu_mulai = $request->waktu_mulai;
        $vouchers->waktu_berakhir = $request->waktu_berakhir;

        if ($vouchers->waktu_mulai > $vouchers->waktu_berakhir) {
            $status = 'expired';
        } else {
            $status = 'aktif';
        }

        $vouchers->status = $status;
        $vouchers->save();
        return redirect()
            ->route('voucher.index')->with('toast_success', 'Data has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $voucher = Voucher::findOrFail($id);
        // return view('admin.voucher.show', compact('voucher'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
public function edit($id)
    {
        $vouchers = Voucher::findOrFail($id);
        return view('admin.voucher.edit', compact('vouchers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_voucher' => 'required|unique:vouchers',
            'harga' => 'required',
            'diskon' => 'required',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
        ]);

        $vouchers = Voucher::findOrFail($id);
        $vouchers->kode_voucher = $request->kode_voucher;
        $vouchers->harga = $request->harga;
        if ($vouchers->harga > 0) {
            $vouchers->label = 'berbayar';
        } else {
            $vouchers->label = 'gratis';
        }
        $vouchers->diskon = $request->diskon;
        $vouchers->waktu_mulai = $request->waktu_mulai;
        $vouchers->waktu_berakhir = $request->waktu_berakhir;

        if ($vouchers->waktu_mulai > $vouchers->waktu_berakhir) {
            $status = 'expired';
        } else {
            $status = 'aktif';
        }

        $vouchers->status = $status;
        $vouchers->save();
        return redirect()
            ->route('voucher.index')->with('toast_success', 'Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher->delete();
        return redirect()->route('voucher.index')->with('success','Data Berhasil Di Hapus!!');
    }
}
