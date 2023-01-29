@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-6">
            <div class="card mb-4 shadow-lg rounded card" style="margin: 2%; padding:1% ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $transaksis->kode_transaksi }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Nama Pembeli</strong>
                                    </td>
                                    <td>{{ $transaksis->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Nama Produk</strong>
                                    </td>
                                    <td>{{ $transaksis->keranjang->produk->nama_produk }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga Produk</strong>
                                    </td>
                                    <td>Rp. {{ number_format($transaksis->keranjang->produk->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Jumlah Produk</strong>
                                    </td>
                                    <td>{{ $transaksis->keranjang->jumlah }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>total Harga</strong>
                                    </td>
                                    <td>Rp. {{ number_format($transaksis->keranjang->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                                <tr>
                                    <th><strong> Jumlah Total Harga </strong></th>
                                    <th><strong><i> Rp. {{ number_format($transaksis->total_harga, 0, ',', '.') }} </i>
                                        </strong></th>
                                </tr>
                                <tr>
                                    <th><strong> Metode Pembayaran </strong></th>
                                    <th><strong>{{ $transaksis->payment->name }}</strong></th>
                                </tr>
                                <tr>
                                    <th><strong> Waktu Pemesanan </strong></th>
                                    <th><strong>{{ $transaksis->waktu_pemesanan }}</strong></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/admin/transaksi') }}" class="btn btn-danger me-3"><svg xmlns="http://www.w3.org/2000/svg"
                        width="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                    </svg> Kembali</a>
            </div>
        </div>
    </div>
@endsection
