@extends('layouts.admin')

@section('content')

    <div class="card shadow-lg rounded card p-2">
        <div class="card-header" id="#atas">
            <span class="fs-4 fw-700">Data Produk</span>
            <button type="button" class="btn mb-3 btn-primary float-end" data-bs-toggle="modal" data-bs-target="#proModal">
                Tambah Data
            </button>
            @include('admin.produk.create')
            <button type="button" class="btn mb-3 btn-primary float-end mx-2" data-bs-toggle="modal"
                data-bs-target="#stokModal1">
                Tambah Stok
            </button>
            @include('admin.produk.stok')
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table datatables table-bordered table-hover" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>kategori</th>
                        <th>Sub kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Diskon</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($produk))
                        @foreach ($produk as $pro)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->kategori->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->subkategori->name }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->nama_produk }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        Rp. {{ number_format($pro->harga, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->stok }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->diskon }}%
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{ $pro->deskripsi }}
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('produk.destroy', $pro->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('produk.show', $pro->id) }}" class="btn btn-sm btn-info"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true" title="Show Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24"
                                                style="fill: rgba(249, 242, 242, 1);transform: ;msFilter:;">
                                                <path
                                                    d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z">
                                                </path>
                                                <path
                                                    d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z">
                                                </path>
                                            </svg>
                                        </a> |
                                        <a href="{{ route('produk.edit', $pro->id) }}" class="btn btn-sm btn-secondary"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true" title="<span>Edit Data</span>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                            </svg>
                                        </a> |
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter{{ $pro->id }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                        </button>
                                        <div class="modal fade" id="modalCenter{{ $pro->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCenterTitle">Apakah Anda
                                                            Yakin?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Kembali
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection


{{-- @include('admin.subkategori.create') --}}

{{-- <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel {{ $pro->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="defaultModalLabel">Apakah Anda Yakin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn mb-2 btn-primary">Hapus</button>
      </div>
    </div>
  </div>
</div>
     --}}
