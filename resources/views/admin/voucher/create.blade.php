<div class="modal fade" id="vocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vocModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('voucher.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Kode Voucher</label>
                            <input type="text" name="kode_voucher"
                                class="form-control mb-2  @error('kode_voucher') is-invalid @enderror"
                                placeholder="Kode Voucher" value="{{ old('kode_voucher') }}">
                            @error('kode_voucher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga"
                                class="form-control mb-2  @error('harga') is-invalid @enderror" placeholder="Harga"
                                value="{{ old('harga') }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="example-palaceholder">Diskon Produk</label>
                            <div class="input-group mb-3">
                                <input type="number" name="diskon"
                                    class="form-control @error('diskon') is-invalid @enderror" placeholder="diskon"
                                    value="0">
                                <button class="btn btn-secondary mb-0" type="button">%</button>
                                @error('diskon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu Mulai</label>
                            <input type="date" name="waktu_mulai"
                                class="form-control mb-2  @error('waktu_mulai') is-invalid @enderror"
                                placeholder="waktu_mulai" value="1">
                            @error('waktu_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu Berakhir</label>
                            <input type="date" name="waktu_berakhir"
                                class="form-control mb-2  @error('waktu_berakhir') is-invalid @enderror"
                                placeholder="waktu_berakhir" value="1">
                            @error('waktu_berakhir')
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
