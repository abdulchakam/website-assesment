@extends('layouts.app')

@push('style')
    <style>

    </style>
@endpush
@section('content')

@include('navbar')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card mt-4 card-custom">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h4 class="card-title">Perbarui Data User</h4>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-sm radius-10 text-white bg-cyan btn-ubah-password">
                                <i class="fas fa-key"></i> Ubah Password
                            </button>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="row justify-content-center">

                            <div class="col-md-4">
                                <form action="{{ url('/avatar-update/'.$user->id) }}" enctype="multipart/form-data" method="POST">
                                    @method('PATCH')
                                    @csrf
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">

                                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="avatar"/>
                                                <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"  @if (empty($user->avatar))
                                                                        style="background-image: url('{{ asset('img/avatar/default-avatar.png')}}');"
                                                                    @else
                                                                        style="background-image: url('{{ asset('img/avatar/'.$user->avatar)}}');"
                                                                    @endif
                                            >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-sm radius-10 btn-update-avatar" hidden> <i class="far fa-image mr-2"></i>Simpan</button>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-8 px-4">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-informasi-user-tab" data-toggle="tab" href="#nav-informasi-user" role="tab" aria-controls="nav-informasi-user" aria-selected="true">Informasi User</a>
                                        <a class="nav-item nav-link" id="nav-informasi-instansi-tab" data-toggle="tab" href="#nav-informasi-instansi" role="tab" aria-controls="nav-informasi-instansi" aria-selected="false">Informasi Instansi</a>
                                    </div>
                                </nav>

                                <form action="" id="form-update-user" method="POST">
                                    @method('PATCH')
                                    @csrf
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active mt-4" id="nav-informasi-user" role="tabpanel" aria-labelledby="nav-informasi-user-tab">
                                                <div class="form-group">
                                                    <label for="nip">NIP </label>
                                                    <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" value="{{ $user->nip }}" disabled>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" value="{{ $user->id }}" id="id_user">
                                                        <div class="form-group">
                                                            <label for="nama">Nama User</label>
                                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nama" value="{{ $user->name }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ho_hp">No Hp</label>
                                                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" value="{{ $user->no_hp }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email User</label>
                                                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="unit_kerja">Unit Kerja</label>
                                                    <input type="text" name="unit_kerja" class="form-control @error('unit_kerja') is-invalid @enderror" id="unit_kerja" value="{{ $user->unit_kerja }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" value="{{ $user->jabatan }}" disabled>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade mt-4" id="nav-informasi-instansi" role="tabpanel" aria-labelledby="nav-informasi-instansi-tab">
                                                <div class="form-group">
                                                    <label for="instansi">Nama Instansi</label>
                                                    <input type="text" name="instansi" class="form-control @error('instansi') is-invalid @enderror" id="instansi" value="{{ $user->instansi }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instansi_induk">Instansi Induk</label>
                                                    <input type="text" name="instansi_induk" class="form-control @error('instansi_induk') is-invalid @enderror" id="instansi_induk" value="{{ $user->instansi_induk }}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alm_instansi">Alamat Instabsi</label>
                                                    <input type="text" name="alm_instansi" class="form-control @error('alm_instansi') is-invalid @enderror" id="alm_instansi" value="{{ $user->alm_instansi }}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp_instansi">Telp Instansi</label>
                                                    <input type="text" name="telp_instansi" class="form-control @error('telp_instansi') is-invalid @enderror" id="telp_instansi" value="{{ $user->telp_instansi }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <a href="{{ url('/') }}"class="btn btn-warning px-4 mr-2 radius-10 btn-kembali"><i class="fas fa-chevron-left mr-2"></i>Kembali</a>
                    <a href="{{ url('/') }}"class="btn btn-danger px-4 mr-2 radius-10 btn-batal" hidden><i class="fas fa-ban mr-2"></i>Batal</a>

                    <button type="button" class="btn btn-primary px-4 radius-10 btn-perbarui"><i class="fas fa-edit mr-2"></i>Perbarui</button>
                    <button type="button" class="btn btn-success px-4 radius-10 btn-simpan-pembaruan" hidden><i class="fas fa-save mr-2"></i>Simpan</button>
                </div>
            </div>

        </div>
    </div>
</div>


{{-- Modal Ubah Password --}}
<div id="modal-ubah-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="form-ubah-password">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header bg-dark-2">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="far fa-times-circle text-danger2"></i>
                        </span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div class="col-md-12 px-4">
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input id="current_password" class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" autocomplete="new-password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input id="password-confirm" class="form-control @error('password-confirm') is-invalid @enderror" type="password" name="password_confirmation" autocomplete="new-password">
                            @error('password-confirm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger px-4 radius-10 mr-2"><i class="fas fa-ban mr-2"></i>Batal</button>
                        <button type="button" class="btn btn-success px-4 radius-10 ml-2 btn-simpan-password"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
            $('.btn-update-avatar').prop('hidden', false);
        });

        $('.btn-perbarui').click(function(){
            const formControls = document.querySelectorAll('.form-control');
            $(formControls).prop('disabled', false);

            $(".btn-batal").prop('hidden', false);
            $(".btn-kembali").prop('hidden', true);

            $(".btn-perbarui").prop('hidden', true);
            $(".btn-simpan-pembaruan").prop('hidden', false);
        });

        $('.btn-simpan-pembaruan').click(function(){
            const id = $('#id_user').val();
            const form_data =  $('#form-update-user').serialize();
            console.log(form_data);

            $.ajax({
                url: `/user-update/${id}`,
                data: form_data,
                method: 'PATCH',
                success: function(data){
                    iziToast.success({
                        title: data.username,
                        message: 'Berhasil diupdate',
                    });

                    const formControls = document.querySelectorAll('.form-control');
                    $(formControls).prop('disabled', true);

                    $(".btn-batal").prop('hidden', true);
                    $(".btn-kembali").prop('hidden', false);

                    $(".btn-perbarui").prop('hidden', false);
                    $(".btn-simpan-pembaruan").prop('hidden', true);

                    clearErrors();


                },
                error: function(error){
                    // console.log(error);
                    $(".btn-perbarui").html('<i class="fas fa-save mr-2"></i> Perbarui');

                    const errors = error.responseJSON.errors
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]

                    clearErrors()

                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            });
        });

        function clearErrors() {
            // remove all error messages
            const errorMessages = document.querySelectorAll('.text-danger')
            errorMessages.forEach((element) => element.textContent = '')
            // remove all form controls with highlighted error text box
            const formControls = document.querySelectorAll('.form-control')
            formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
        }

        $('.btn-ubah-password').click(function(){
            $('#modal-ubah-password').modal('show');
        });

        $('.btn-simpan-password').click(function(){
            const data = $('#form-ubah-password').serialize();

            $.ajax({
                url:`/password-update`,
                data: data,
                method: 'PATCH',
                success:function(){
                    iziToast.success({
                        title: 'Berhasil! ',
                        message: 'Password diubah...',
                    });
                    clearErrors();

                    window.location.assign('/login');
                },
                error:function(error){
                    console.log(error);
                    $(".btn-perbarui").html('<i class="fas fa-save mr-2"></i> Perbarui');

                    const errors = error.responseJSON.errors
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]

                    clearErrors()

                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            });
        });
    </script>
@endpush
