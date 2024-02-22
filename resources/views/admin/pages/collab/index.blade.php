@extends('admin.layouts.app')

@section('content')
    <style>
        .btn-xs {
            padding: 7px 15px;
            font-size: 10px;
        }
    </style>
    <div class=" p-1">
        <div class="card border-0 shadow p-3 mt-3">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h4 class="m-2">Mitra</h4>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-lg-end justify-content-start">
                        <div class="d-flex align-items-center gap-2">
                            <p class="m-0 me-2">Cari:</p>
                            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                        </div>
                        <button class="btn btn-primary m-0" type="button" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow rounded">
                    <div class="ribbon mt-2 ribbon-primary ribbon-space-bottom">Magang</div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex gap-3 justify-content-start">
                                <img src="{{ asset('assets/images/avtar/11.jpg') }}" class="rounded" width="110px"
                                    alt="">
                                <div class="">
                                    <span class="badge" style="background-color: #E8FFEE; color: #008000">Perusahaan</span>
                                    <p class="my-3" style="font-size: 13px">PT. Pama Persada</p>
                                    <div class="mt-2">
                                        <button class="btn btn-primary btn-xs mt-2">Edit</button>
                                        <button class="btn btn-danger btn-xs mt-2">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow rounded">
                    <div class="ribbon mt-2 ribbon-primary ribbon-space-bottom">Magang</div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex gap-3 justify-content-start">
                                <img src="{{ asset('assets/images/avtar/11.jpg') }}" class="rounded" width="110px"
                                    alt="">
                                <div class="">
                                    <span class="badge"
                                        style="background-color: #EAF3FF; color: #307EF3">Pemerintahan</span>
                                    <p class="my-3" style="font-size: 13px">Pemerintah Kab.Wonogiri</p>
                                    <div class="mt-2">
                                        <button class="btn btn-primary btn-xs mt-2">Edit</button>
                                        <button class="btn btn-danger btn-xs mt-2">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow rounded">
                    <div class="ribbon mt-2 ribbon-primary ribbon-space-bottom">Magang</div>
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex gap-3 justify-content-start">
                                <img src="{{ asset('assets/images/avtar/11.jpg') }}" class="rounded" width="110px"
                                    alt="">
                                <div class="">
                                    <span class="badge" style="background-color: #FFF8EA; color: #FFAA05">Sekolah</span>
                                    <p class="my-3" style="font-size: 13px">Smk Negeri 1 Malang</p>
                                    <div class="mt-2">
                                        <button class="btn btn-primary btn-xs mt-2">Edit</button>
                                        <button class="btn btn-danger btn-xs mt-2">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form" novalidate=""
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Mitra</label>
                                <input class="form-control" type="text" required="" autocomplete="name">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label>Kategori</label>
                                <select class="js-example-basic-single" aria-label=".form-select example">
                                    <option selected="">What's Your Hobbies </option>
                                    <option value="1">Kho-kho</option>
                                    <option value="2">Reading Books</option>
                                    <option value="3">Creativity</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" id="formFile" type="file">
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
                <form class="form-bookmark needs-validation" action="#" method="POST" id="bookmark-form"
                    novalidate="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Nama Mitra</label>
                                <input class="form-control" type="text" required="" autocomplete="name">
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label>Kategori</label>
                                <select class="js-example-basic-single" aria-label=".form-select example">
                                    <option selected="">What's Your Hobbies </option>
                                    <option value="1">Kho-kho</option>
                                    <option value="2">Reading Books</option>
                                    <option value="3">Creativity</option>
                                </select>
                            </div>
                            <div class="mb-3 mt-0 col-md-12">
                                <label for="bm-title">Foto</label>
                                <input class="form-control" id="formFile" type="file">
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

    <nav class="m-b-30" aria-label="Page navigation example">
        <ul class="pagination justify-content-center pagin-border-primary pagination-primary">
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
        </ul>
    </nav>
@endsection
@section('script')
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
