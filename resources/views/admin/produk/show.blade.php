@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-6">
            <div class="card mb-4 shadow-lg rounded card" style="margin: 2%; padding:1% ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $produk->nama_produk }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <strong>Kategori</strong>
                                    </td>
                                    <td>{{ $produk->kategori->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Sub Kategori</strong>
                                    </td>
                                    <td>{{ $produk->subkategori->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Nama Produk</strong>
                                    </td>
                                    <td> {{ $produk->nama_produk }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga Awal</strong>
                                    </td>
                                    <td>Rp. {{ number_format($produk->hpp, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Harga Jual</strong>
                                    </td>
                                    <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="table-border-bottom-0">
                                <tr>
                                    <th><strong> stok</strong></th>
                                    <th><strong><i> {{ number_format($produk->stok, 0, ',', '.') }} </i>
                                        </strong></th>
                                </tr>
                                <tr>
                                    <th><strong> Diskon </strong></th>
                                    <th><strong>{{ $produk->diskon }}</strong></th>
                                </tr>
                                <tr>
                                    <th><strong>Deskripsi </strong></th>
                                    <th><strong>{{ $produk->deskripsi }}</strong></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/admin/produk') }}" class="btn btn-danger me-3"><svg xmlns="http://www.w3.org/2000/svg"
                        width="20" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                    </svg> Kembali</a>
            </div>
        </div>
    </div>
@endsection
