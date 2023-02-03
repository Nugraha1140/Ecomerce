<div class="modal fade" id="proModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proModalLabel">Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Name Kategori</label>
                        <select name="kategori_id" id="kategori"
                            class="form-control @error('kategori_id') is-invalid @enderror">
                            @foreach ($kategoris as $kategori)
                                <option value="" hidden>Pilih Kategori</option>
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}
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
                        <label class="form-label">Sub Kategori</label>
                        <select name="sub_kategori_id" id="sub_kategori"
                            class="form-control @error('sub_kategori_id') is-invalid @enderror">
                            <option value="" hidden>Pilih Kategori Terlebih dulu</option>
                        </select>
                        @error('sub_kategori_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="example-password">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control"
                            @error('nama_produk') is-invalid @enderror placeholder="Nama Produk"
                            value="{{ old('nama_produk') }}">
                        @error('nama_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="example-password">Harga</label>
                        <input type="text" name="harga" class="form-control" @error('harga') is-invalid @enderror
                            placeholder="Harga Produk" value="{{ old('harga') }}">
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="example-palaceholder">Stok Produk</label>
                            <input type="number" name="stok"
                                class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
                                value="0">
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="example-palaceholder">Diskon Produk</label>
                            <div class="input-group mb-3">
                                <input type="number" name="diskon"
                                    class="form-control @error('diskon') is-invalid @enderror"
                                    placeholder="diskon Produk" value="0">
                                <button class="btn btn-secondary mb-0" type="button">%</button>
                                @error('diskon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="example-palaceholder">Deskripsi</label>
                        <textarea name="deskripsi" cols="20" rows="3" class="form-control  @error('deskripsi') is-invalid @enderror"
                            placeholder="deskripsi" value="{{ old('deskripsi') }}"></textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gambar Produk</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('gambar_produk') is-invalid @enderror"
                                name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                            @error('gambar_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#kategori').on('change', function() {
            var kategori_id = $(this).val();
            if (kategori_id) {
                $.ajax({
                    url: '/admin/getSub_kategori/' + kategori_id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#sub_kategori').empty();
                            $('#sub_kategori').append(
                                '<option hidden>Pilih Sub Kategori</option>');
                            $.each(data, function(key, sub_kategori) {
                                $('select[name="sub_kategori_id"]').append(
                                    '<option value="' + sub_kategori.id + '">' +
                                    sub_kategori.name + '</option>');
                            });
                        } else {
                            $('#sub_kategori').empty();
                        }
                    }
                });
            } else {
                $('#sub_kategori').empty();
            }
        });
    });
</script>
{{-- @endsection --}}
