<div class="modal fade" id="stokModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stokModalLabel">Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('stok.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Name Produk</label>
                            <select name="produk_id" class="form-select @error('produk_id') is-invalid @enderror">
                                @foreach ($produk as $pro)
                                    <option value="" hidden>Pilih Produk</option>
                                    <option value="{{ $pro->id }}">{{ $pro->nama_produk }}
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
                            <label for="example-password">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control"
                                @error('jumlah') is-invalid @enderror placeholder="jumlah"
                                value="{{ old('name_produk') }}">
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
