<div class="modal fade" id="traModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="traModalLabel">Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data"> --}}
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Name Pembeli</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                            @foreach ($users as $user)
                                <option value="" hidden>Pilih Pembeli</option>
                                <option value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telpon</label>
                        <input type="text" name="notlp"
                            class="form-control mb-2  @error('notlp') is-invalid @enderror" placeholder="notlp"
                            value="">
                        @error('notlp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-palaceholder">Alamat</label>
                        <textarea name="alamat" cols="20" rows="3" class="form-control  @error('alamat') is-invalid @enderror"
                            placeholder="alamat" value="{{ old('alamat') }}"></textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name Produk</label>
                        <select name="keranjang_id" class="form-select @error('keranjang_id') is-invalid @enderror">
                            @foreach ($keranjangs as $keranjang)
                                <option value="" hidden>Pilih Produk</option>
                                <option value="{{ $keranjang->id }}">{{ $keranjang->produk->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                        @error('keranjang_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="payment_id" class="form-select @error('payment_id') is-invalid @enderror">
                            @foreach ($payments as $payment)
                                <option value="" hidden>Pilih Metode</option>
                                <option value="{{ $payment->id }}">{{ $payment->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('payment_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                            <label class="form-label">Waktu Pemesanan</label>
                            <input type="date" name="waktu_pemesanan"
                                class="form-control mb-2  @error('waktu_pemesanan') is-invalid @enderror"
                                placeholder="waktu_pemesanan" value="1">
                            @error('waktu_pemesanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>
{{-- @extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-8">
                <div class="card mb-4 shadow-lg rounded card" style="margin: 2%; padding:1% ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Data transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">User</label>
                            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                @foreach ($users as $user)
                                    <option value="" hidden>Pilih Pembeli</option>
                                    <option value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name Produk</label>
                            <select name="keranjang_id" class="form-select @error('keranjang_id') is-invalid @enderror">
                                @foreach ($keranjangs as $keranjang)
                                    <option value="" hidden>Pilih Produk</option>
                                    <option value="{{ $keranjang->id }}">{{ $keranjang->produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('keranjang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">alamat</label>
                            <input type="text" name="alamat"
                                class="form-control mb-2  @error('alamat') is-invalid @enderror"
                                value="{{ Auth::user()->email }}">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment</label>
                            <select name="payment_id" class="form-select @error('payment_id') is-invalid @enderror">
                                @foreach ($payments as $payment)
                                    <option value="" hidden>Payment</option>
                                    <option value="{{ $payment->id }}">{{ $payment->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">jumlah</label>
                            <input type="number" name="jumlah"
                                class="form-control mb-2  @error('jumlah') is-invalid @enderror"
                                placeholder="Waktu pemesanan" value="{{ old('jumlah') }}">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu pemesanan</label>
                            <input type="date" name="waktu_pemesanan"
                                class="form-control mb-2  @error('waktu_pemesanan') is-invalid @enderror"
                                placeholder="Waktu pemesanan" value="{{ old('waktu_pemesanan') }}">
                            @error('waktu_pemesanan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('/admin/transaksi') }}" class="btn btn-danger me-3"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" fill="currentColor"
                            class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                        </svg> Kembali</a>
                    <button type="submit" class="btn btn-primary mx-3">
                        <span class="indicator-label"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                <path
                                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                            </svg> Kirim </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection --}}
