<button class="btn btn-primary m-0" type="button" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>

<!-- Add Modal -->
<div class="modal fade modal-bookmark" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold" id="exampleModalLabel">Tambah Layanan</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-bookmark needs-validation" action="{{ route('create.service') }}" method="POST" id="bookmark-form" novalidate=""
                enctype="multipart/form-data">
                @csrf
                
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="form-group mb-3 mt-0 col-md-12">
                            <label for="name">Foto Layanan</label>
                            <input class="form-control" id="name" type="file" name="image" required placeholder="Contoh: Produk Hummatech" autocomplete="name" />
                        </div>
                        <div class="form-group mb-3 mt-0 col-md-12">
                            <label for="description">Nama Layanan</label>
                            <input class="form-control" id="name" name="name" type="text" required placeholder="Contoh: Produk Hummatech" autocomplete="name" />
                        </div>
                        <div class="form-group mb-3 mt-0 col-md-12">
                            <label for="feature">Deskripsi Layanan</label>
                            <textarea rows="5" class="form-control" id="feature" name="description" placeholder="Jelaskan fitur produknya"></textarea>
                        </div>
                        <div class="form-group mb-3 mt-0 col-md-12">
                            <label for="link">File Proposal</label>
                            <input class="form-control" id="link" name="file" type="file" required placeholder="Contoh: https://hummatech.com/linknya" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
