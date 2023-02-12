@extends('template.template')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-13 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Welcome To</p>
                        <h1>Your Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Produk</th>
                                    <th class="product-name">Nama Produk</th>
                                    <th class="product-price">Harga</th>
                                    <th class="product-quantity">Jumlah</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-disc">Diskon</th>
                                    <th class="product-totalharga">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($keranjangs))
                                    @foreach ($keranjangs as $keranjang)
                                        <form action="{{ route('checkout.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="keranjang_id" value="{{ $keranjang->id }}">
                                            <input type="hidden" name="user_id" value="1">
                                            {{-- <input type="hidden" name="produk_id" value="{{ $keranjang->produk->id }}"> --}}
                                            <tr class="table-body-row">
                                                <td class="product-remove"> <input type="checkbox" name="produk_id[]"
                                                        value="{{ $keranjang->produk->id }}"></td>
                                                <td class="product-image"><img
                                                        src="{{ asset($keranjang->produk->image[0]->gambar_produk) }}"
                                                        alt=""></td>
                                                <td class="product-name">{{ $keranjang->produk->nama_produk }}</td>
                                                <td class="product-price"> RP.
                                                    {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                                <td class="product-quantity"><input type="number" name="jumlah"
                                                        value="{{ $keranjang->jumlah }}">
                                                </td>
                                                <td class="product-total">{{ $keranjang->jumlah }}</td>
                                                <td class="product-disc">{{ $keranjang->produk->diskon }}</td>
                                                <td class="product-totalharga">RP.
                                                    {{ number_format($keranjang->total_harga, 0, ',', '.') }}</td>
                                            </tr>
                                    @endforeach
                                @endif
                                <button class="boxed-btn" type="submit">
                                    Checkout</button>

                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="total-section">
                        <div class="cart-buttons">
                            <a href="#" class="boxed-btn">Update Cart</a>
                            <a href="#" class="boxed-btn">Checkout</a>
                            <button class="boxed-btn" type="submit">
                                Checkout</button>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Apply Coupon</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.html">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Apply"></p>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
