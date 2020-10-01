<div id="modal-add-domain" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Domain</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-domain">
                @csrf
                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                        <label for="nama_domain">Nama domain</label>
                        <input id="nama_domain" type="text" class="form-control" name="nama_domain" value="{{ old('nama_domain') }}"  autocomplete="nama_domain" autofocus required>
                        <span class="invalid-feedback" id="nama_domain_error"></span>
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="ket_domain">Keterangan</label>
                        <input id="ket_domain" type="text" class="form-control" name="ket_domain" value="{{ old('ket_domain') }}"  autocomplete="ket_domain" autofocus required>
                        <span class="invalid-feedback" id="ket_domain_error"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary px-5 btn-save-domain">
                    Tambah
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Tambah Aspek --}}
<div id="modal-add-aspek" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Aspek</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-aspek">
                @csrf
                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                        <label for="nama_aspek">Nama Aspek</label>
                        <input id="nama_aspek" type="text" class="form-control" name="nama_aspek" value="{{ old('nama_aspek') }}"  autocomplete="nama_aspek" autofocus required>
                            <span class="invalid-feedback" id="nama_aspek_error"></span>
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="ket_aspek">Keterangan</label>
                        <input id="ket_aspek" type="text" class="form-control" name="ket_aspek" value="{{ old('ket_aspek') }}"  autocomplete="ket_aspek" autofocus required>
                        <span class="invalid-feedback" id="ket_aspek_error"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary px-5 btn-save-aspek">
                    Tambah
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Edit Domain --}}
<div id="modal-edit-domain" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit Domain</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-edit">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id_domain" id="id_domain">
                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                        <label for="nama_domain">Nama domain</label>
                        <input id="nama_domain_edit" type="text" class="form-control @error('nama_domain') is-invalid @enderror" name="nama_domain" value="{{ old('nama_domain') }}"  autocomplete="nama_domain" autofocus>
                        @error('nama_domain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="ket_domain">Keterangan</label>
                        <input id="ket_domain_edit" type="text" class="form-control @error('ket_domain') is-invalid @enderror" name="ket_domain" value="{{ old('ket_domain') }}"  autocomplete="ket_domain" autofocus>
                        @error('ket_domain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="button" class="btn btn-primary px-5 btn-update">
                    Update
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Edit Domain --}}
<div id="modal-edit-aspek" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit aspek</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-edit-aspek">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id_aspek" id="id_aspek">
                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                        <label for="nama_aspek">Nama Aspek</label>
                        <input id="nama_aspek_edit" type="text" class="form-control @error('nama_aspek') is-invalid @enderror" name="nama_aspek" value="{{ old('nama_aspek') }}"  autocomplete="nama_aspek" autofocus>
                        @error('nama_aspek')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="ket_aspek">Keterangan</label>
                        <input id="ket_aspek_edit" type="text" class="form-control @error('ket_aspek') is-invalid @enderror" name="ket_aspek" value="{{ old('ket_aspek') }}"  autocomplete="ket_aspek" autofocus>
                        @error('ket_aspek')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="button" class="btn btn-primary px-5 btn-update-aspek">
                    Update
                </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal Hapus Domain--}}
<div id="modal-hapus-domain" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="my-modal-title"> <strong class="text-white font-weight-bold">Yakin anda akan menghapus?</strong></h5>
                <button class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4">
                Data yang sudah dihapus tidak bisa dikebalikan!
            </div>
            <div class="modal-footer">
                <button type="button" id="batal-domain" class="btn btn-md btn-secondary">Batal</button>
                <button type="button" id="hapus-domain" class="btn btn-md btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Hapus Aspek--}}
<div id="modal-hapus-aspek" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="my-modal-title"> <strong class="text-white font-weight-bold">Yakin anda akan menghapus?</strong></h5>
                <button class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4">
                Data yang sudah dihapus tidak bisa dikebalikan!
            </div>
            <div class="modal-footer">
                <button type="button" id="batal-aspek" class="btn btn-md btn-secondary">Batal</button>
                <button type="button" id="hapus-aspek" class="btn btn-md btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>


{{-- Modal Hapus Indikator--}}
<div id="modal-hapus-indikator" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="my-modal-title"> <strong class="text-white font-weight-bold">Yakin anda akan menghapus?</strong></h5>
                <button class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4">
                Data yang sudah dihapus tidak bisa dikebalikan!
            </div>
            <div class="modal-footer">
                <button type="button" id="batal-indikator" class="btn btn-md btn-secondary">Batal</button>
                <button type="button" id="hapus-indikator" class="btn btn-md btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
