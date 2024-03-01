@extends('admin.layouts.app')

@section('subcontent')
<div class="d-flex justify-content-between align-items-end pt-4">
    <div class="col-12 col-lg-3 ">
        <label for="kategori" class="form-label">Pilih kategori</label>
        <select class="form-select" aria-label="Default select example" name="kategori">
            <option>Semua</option>
            @forelse ($collabMitras as $collabMitra)
                <option value="{{ $collabMitra->id }}">{{ $collabMitra->name }}</option>
            @empty
                <option value="" disabled>Belum ada kategori produk</option>
            @endforelse
        </select>
    </div>
    <div class="col-12 col-lg-7 d-flex justify-content-end">
        <div class="d-flex gap-2 col-sm-7">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control" placeholder="Cari Produk" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
        </div>
    </div>
</div>

@endsection

@section('content')
    <style>
        .btn-xs {
            padding: 7px 15px;
            font-size: 10px;
        }
    </style>
    <div class="col-lg-12 pt-5">
        <div class="row">
            @forelse ($collabMitras as $index=>$collabMitra)
            <div class="col-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow rounded">
                    {{-- <div class="ribbon mt-2 ribbon-primary ribbon-space-bottom">Magang</div> --}}
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex gap-3 justify-content-start">
                                <img src="{{ asset('storage/' . $collabMitra->image) }}" class="rounded" width="110px" height="110px" class="object-fit-cover"
                                    alt="">
                                <div class="">
                                    <span class="badge" style="background-color: #FFF8EA; color: #FFAA05">{{ $collabMitra->collabCategory->name }}</span>
                                    <p class="my-3" style="font-size: 13px">{{ $collabMitra->name }}</p>
                                    <div class="mt-2">
                                        <button class="btn btn-edit btn-xs mt-2" style="background-color: #DDEAFF; color: #307EF3" type="button" data-bs-toggle="modal"
                                        data-bs-target="#edit" data-id="{{ $collabMitra->id }}"
                                        data-name="{{ $collabMitra->name }}" data-image="{{ $collabMitra->image }}" data-collab_category_id="{{ $collabMitra->collab_category_id }}">Edit</button>
                                        <button class="btn-delete btn btn-xs mt-2" style="background-color: #FFE8EA; color: #DC3545" data-id="{{ $collabMitra->id }}">
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <div class="d-flex justify-content-center">
                <img src="{{ asset('nodata.jpg') }}" alt="" width="400px">
            </div>
            <h5 class="text-center">
                Data Masih Kosong
            </h5>
            @endforelse
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Mitra</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" action="create/collab/mitra" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Mitra</label>
                                <input class="form-control" type="text" required="" autocomplete="name" name="name" placeholder="Masukkan nama mitra">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Kategori</label>
                                <select class="tambah" aria-label=".form-select example" name="collab_category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->collab_category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="">Pilih Halaman</label>
                                <select name="service_id" id="" class="form-select">
                                    <option value selected disabled>Pilih halaman</option>
                                    @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" name="image" id="formFile" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade modal-bookmark" id="edit" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mitra</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Mitra</label>
                                <input class="form-control" type="text" required="" autocomplete="name" name="name" id="name-edit">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Kategori</label>
                                <select class="js-example-basic-single" aria-label=".form-select example" name="collab_category_id" id="category-edit">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->collab_category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label><br>
                                <img id="image-edit" style="width: 200px; height: auto; border: 1px solid #ccc;">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Perbarui</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    @include('admin.components.delete-modal-component')
@endsection
@section('script')
<script>
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', 'delete/collab/mitra/' + id);
        $('#modal-delete').modal('show');
    });
    $('.btn-edit').click(function() {
        var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
        var name = $(this).data('name'); // Mengambil nilai name dari tombol yang diklik
        var image = $(this).data('image');
        var collab_category_id = $(this).data('collab_category_id');

        $('#form-update').attr('action', 'update/collab/mitra/' + id); // Mengubah nilai atribut action form
        $('#name-edit').val(name);
        $('#category-edit').val(collab_category_id);
        $('#image-edit').attr('src', 'storage/'+image);
        $('#modal-edit').modal('show');
    });
</script>
<script>
    $('#datatable table').DataTable({
        searching: false,
        columnDefs: [{
            targets: 2,
            sortable: false
        }]
    });
</script>
    <script>
        $(document).ready(function() {
            $(".tambah").select2({
                dropdownParent: $("#tambah")
            });
        });
        $(document).ready(function() {
            $(".js-example-basic-single").select2({
                dropdownParent: $("#edit")
            });
        });

    </script>
@endsection
