@extends('admin.layouts.app')

@section('header-style')
    <style>
        #datatable .table th {
            background: #36405E;
            color: white;
        }

        #datatable .table tr:nth-of-type(odd) td {
            background: #F0F0F0 !important;
        }

        #datatable .table tr:nth-of-type(even) td {
            background: #FFF !important;
        }

        #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: #FAFAFA !important;
        }

        #datatable .table tr:nth-of-type(odd) .sorting_1 {
            background: #F0F0F0 !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(odd) td {
            background: none !important;
            color: white !important;
        }

        .dark-only #datatable tr td {
            border-color: rgba(var(--bs-white-rgb), .25) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(even) td {
            color: white !important;
            background: rgba(var(--bs-white-rgb), .125) !important;
        }

        .dark-only #datatable .table tr:nth-of-type(odd) .sorting_1,
        .dark-only #datatable .table tr:nth-of-type(even) .sorting_1 {
            background: rgba(var(--bs-white-rgb), .15) !important;
        }

        .dark-only #datatable .dataTables_paginate {
            border-color: rgba(var(--bs-white-rgb), .15);
        }

        .dark-only #datatable .paginate_button,
        .dark-only #datatable .dataTables_info {
            color: rgba(var(--bs-white-rgb), 1) !important;
        }
    </style>
@endsection

@section('subcontent')
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Kategori Berita</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>
                        @include('admin.pages.news-category.create')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="modal fade modal-bookmark" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori Mitra</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-bookmark needs-validation" method="POST" id="form-update" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Kategori Mitra</label>
                                <input class="form-control name"name="name" type="text" required="" autocomplete="name"
                                    placeholder="Masukkan Nama Kategori">
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

    <div class="table-responsive custom-scrollbar" id="datatable">
        <table class="table table-striped display">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categoryNews as $index=>$categoryNew)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $categoryNew->name }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn-edit btn btn-warning" data-id="{{ $categoryNew->id }}" data-name="{{ $categoryNew->name }}"
                                    id="{{ $categoryNew->id }}">
                                    Edit
                                </button>
                                <button class="btn-delete btn btn-danger" data-id="{{ $categoryNew->id }}"
                                    id="{{ $categoryNew->id }}">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    @include('admin.components.delete-modal-component')
@endsection

@section('script')
    <script>
        $('#datatable table').DataTable({
            searching: false,
            columnDefs: [{
                targets: 2,
                sortable: false
            }]
        });
        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', '/delete/category/news/' + id);
            $('#modal-delete').modal('show');
        });
        $('.btn-edit').click(function() {
            var id = $(this).data('id'); // Mengambil nilai id dari tombol yang diklik
            var name = $(this).data('name'); // Mengambil nilai name dari tombol yang diklik
            $('#form-update').attr('action', '/update/category/news/' + id ); // Mengubah nilai atribut action form
            $('.name').val(name);
            $('#modal-edit').modal('show');
        });
    </script>
@endsection
