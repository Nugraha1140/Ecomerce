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
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-body-row">
                                    @foreach ($keranjangs as $keranjang)
                                        <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image"><img
                                                src="{{ asset('components/img/products/product-img-1.jpg') }}"
                                                alt=""></td>
                                        <td class="product-name">{{ $keranjang->produk->nama_produk }}</td>
                                        <td class="product-price"> RP.
                                            {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                        <td class="product-quantity"><input type="number" name="jumlah" value="0">
                                        </td>
                                        <td class="product-total">{{ $keranjang->jumlah }}</td>
                                        <td class="product-totalharga">RP.
                                            {{ number_format($keranjang->total_harga, 0, ',', '.') }}</td>
                                    @endforeach
                                </tr>

                                {{-- <tr class="table-body-row">
                                    <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                    </td>
                                    <td class="product-image"><img src="assets/img/products/product-img-2.jpg"
                                            alt=""></td>
                                    <td class="product-name">Berry</td>
                                    <td class="product-price">$70</td>
                                    <td class="product-quantity"><input type="number" placeholder="0"></td>
                                    <td class="product-total">1</td>
                                </tr>
                                <tr class="table-body-row">
                                    <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                    </td>
                                    <td class="product-image"><img src="assets/img/products/product-img-3.jpg"
                                            alt=""></td>
                                    <td class="product-name">Lemon</td>
                                    <td class="product-price">$35</td>
                                    <td class="product-quantity"><input type="number" placeholder="0"></td>
                                    <td class="product-total">1</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="total-data">
                                    <td><strong>Total Harga: </strong></td>
                                    {{-- <td> RP. {{ number_format($keranjang->produk->total_harga, 0, ',', '.') }}</td> --}}
                                </tr>

                                {{-- <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>$45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td>$545</td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="cart.html" class="boxed-btn">Update Cart</a>
                            <a href="checkout.html" class="boxed-btn black">Check Out</a>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end cart -->
@endsection
