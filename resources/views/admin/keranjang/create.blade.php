<div class="modal fade" id="kerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kerModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('keranjang.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label">Name Produk</label>
                            <select name="produk_id" class="form-select @error('produk_id') is-invalid @enderror">
                                @foreach ($produks as $produk)
                                    <option value="" hidden>Pilih Produk</option>
                                    <option value="{{ $produk->id }}">{{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            @error('produk_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">jumlah Produk</label>
                            <input type="number" name="jumlah"
                                class="form-control mb-2  @error('jumlah') is-invalid @enderror" placeholder="jumlah"
                                value="1">
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
