{{-- Modal Multiple User --}}
<div id="modal-data-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left card-custom">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header row d-flex justify-content-between mx-0  mb-0 pb-0 border-0 bg-dark-2">
                <div class="tabs active" id="tab01">
                    <h6 class="font-weight-bold">Informasi User</h6>
                </div>
                <div class="tabs" id="tab02">
                    <h6 class="text-muted mx-4">Informasi Instansi</h6>
                </div>
                <div class="tabs" id="tab03">
                    <h6 class="text-muted">Tambah Informasi</h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="far fa-times-circle text-danger2"></i>
                    </span>
                </button>
            </div>
            <div class="line"></div>
            <div class="modal-body p-0">
                <form action="" id="form-tambah-user">
                    <fieldset class="show" id="tab011">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Informasi User</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="nip">NIP</label>
                                        <input id="nip" type="text" class="form-control fnip" name="nip" value="{{ old('nip') }}" readonly autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text" class="form-control fname" name="name" value="{{ old('name') }}" readonly autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <input id="unit_kerja" type="unit_kerja" class="form-control funit_kerja" name="unit_kerja" value="{{ old('unit_kerja') }}" readonly autocomplete="unit_kerja">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="jabatan">Jabatan</label>
                                        <input id="jabatan" type="jabatan" class="form-control fjabatan" name="jabatan" value="{{ old('jabatan') }}" readonly autocomplete="jabatan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="no_hp">No Hp</label>
                                        <input id="no_hp" type="no_hp" class="form-control fno_hp" name="no_hp" value="{{ old('no_hp') }}" readonly autocomplete="no_hp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control femail" name="email" value="{{ old('email') }}" readonly autocomplete="email">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset  id="tab021">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Informasi Instansi</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="instansi">Instansi</label>
                                        <input id="instansi" type="instansi" class="form-control finstansi" name="instansi" value="{{ old('instansi') }}" readonly autocomplete="instansi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="instansi_induk">Instansi Induk</label>
                                        <input id="instansi_induk" type="instansi_induk" class="form-control finstansi_induk" name="instansi_induk" value="{{ old('instansi_induk') }}" readonly autocomplete="instansi_induk">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="telp_instansi">Telp Instansi</label>
                                        <input id="telp_instansi" type="telp_instansi" class="form-control ftelp_instansi" name="telp_instansi" value="{{ old('telp_instansi') }}" readonly autocomplete="telp_instansi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="alm_instansi">Alamat instansi</label>
                                        <input id="alm_instansi" type="alm_instansi" class="form-control falm_instansi" name="alm_instansi" value="{{ old('alm_instansi') }}" readonly autocomplete="alm_instansi">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset  id="tab031">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Tambah Informasi</h4>
                        </div>
                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                            <label for="role">Level User</label>
                                <select id="role" class="form-control" name="role" id="role">
                                    <option disabled selected>Pilih level user</option>
                                    <option value="user"
                                        @if (old('role') == 'user')
                                            selected
                                        @endif>User</option>
                                    <option value="admin"
                                        @if (old('role') == 'admin')
                                            selected
                                        @endif>Admin</option>
                                    <option value="super admin"
                                        @if (old('role') == 'super admin')
                                            selected
                                        @endif>Super Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mx-auto mb-4">
                            <div class="col-6">
                                <div class="form-group row mx-auto">
                                    <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group row mx-auto">
                                    <label for="password_confirm">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                                </div>
                            </div>
                        </div>

                        <div class="line"></div>
                        <div class="modal-footer bg-light-blue d-flex justify-content-end">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success radius-10 btn-block btn-simpan">
                                    <i class="fas fa-save mr-2"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
