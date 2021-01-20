@extends('admin.index')

@section('content')

@include('admin/components/modal')


<div class="container">
    <div class="card card-custom">
        <div class="card-body">
            <div class="pt-2 pb-4 d-flex justify-content-between align-items-center">
                <a href="{{ url('/users') }}" class="text-secondary"><i class="fas fa-chevron-left fa-lg"></i> Kembali</a>

                <span class="badge badge-pill badge-light px-4 py-2 text-dark">{{ $user->role }}</span>
            </div>
            <div class="container p-4">
                <h3 class="card-title mr-auto"> Detail User</h3>
                <nav class="mt-2">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-user-tab" data-toggle="tab" href="#nav-user" role="tab" aria-controls="nav-user" aria-selected="true">Informasi User</a>
                        <a class="nav-item nav-link" id="nav-instansi-tab" data-toggle="tab" href="#nav-instansi" role="tab" aria-controls="nav-instansi" aria-selected="false">Informasi Instansi</a>
                    </div>
                </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
                            <div class="table-responsive">
                                <table class="table table-striped my-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="3">
                                                Informasi User
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-25">NIP</td>
                                            <td>:</td>
                                            <td>{{ $user->nip }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25">Nama</td>
                                            <td>:</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>No Hp</td>
                                            <td>:</td>
                                            <td>{{ $user->no_hp }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Unit Kerja</td>
                                            <td>:</td>
                                            <td>{{ $user->unit_kerja }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td>{{ $user->jabatan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-instansi" role="tabpanel" aria-labelledby="nav-instansi-tab">
                            <div class="table-responsive">
                                <table class="table table-striped my-4">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th colspan="3">
                                                Informasi Instansi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-25">Nama Instansi</td>
                                            <td>:</td>
                                            <td>{{ $user->instansi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Instansi Induk</td>
                                            <td>:</td>
                                            <td>{{ $user->instansi_induk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Instansi</td>
                                            <td>:</td>
                                            <td>{{ $user->alm_instansi }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telp Instansi</td>
                                            <td>:</td>
                                            <td>{{ $user->telp_instansi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-footer">
            @role('super admin')
                <div class="d-flex justify-content-end">
                    @if ( App\User::where('role','super admin')->count() > 1 || Auth::user()->role !== $user->role)
                        <button type="button" class="btn btn-danger radius-10 mx-2 hapus" data-id="{{ $user->id }}" data-nama="{{ $user->name }}" data-role="{{ $user->role }}">
                            <i class="fas fa-trash mr-2"></i> Hapus
                        </button>
                    @endif
                    <button type="button" class="btn edit btn-primary radius-10 mx-2"> <i class="fas fa-edit mr-2"></i> Edit</button>
                </div>
            @endrole
        </div>
    </div>
</div>


{{-- Modal Edit User  --}}
<div id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left card-custom">
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
                <form action="" id="form-edit-user">
                    <fieldset class="show2" id="tab011-edit">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Informasi User</h4>
                        </div>

                        <input type="hidden" value="{{ $user->id }}" id="user_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="nip">NIP</label>
                                        <input id="edit-nip" type="text" class="form-control fnip" name="nip" value="{{ old('nip') ?? $user->nip}}" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="name">Nama</label>
                                        <input id="edit-name" type="text" class="form-control fname" name="name" value="{{ old('name') ?? $user->name }}" autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="unit_kerja">Unit Kerja</label>
                                        <input id="edit-unit_kerja" type="unit_kerja" class="form-control funit_kerja" name="unit_kerja" value="{{ old('unit_kerja') ?? $user->unit_kerja }}" autocomplete="unit_kerja">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="jabatan">Jabatan</label>
                                        <input id="edit-jabatan" type="jabatan" class="form-control fjabatan" name="jabatan" value="{{ old('jabatan') ?? $user->jabatan }}" autocomplete="jabatan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="no_hp">No Hp</label>
                                        <input id="edit-no_hp" type="no_hp" class="form-control fno_hp" name="no_hp" value="{{ old('no_hp') ?? $user->no_hp }}" autocomplete="no_hp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input id="edit-email" type="email" class="form-control femail" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset  id="tab021-edit">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Informasi Instansi</h4>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="instansi">Instansi</label>
                                        <input id="edit-instansi" type="instansi" class="form-control finstansi" name="instansi" value="{{ old('instansi') ?? $user->instansi }}"  autocomplete="instansi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="instansi_induk">Instansi Induk</label>
                                        <input id="edit-instansi_induk" type="instansi_induk" class="form-control finstansi_induk" name="instansi_induk" value="{{ old('instansi_induk') ?? $user->instansi_induk }}"  autocomplete="instansi_induk">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="telp_instansi">Telp Instansi</label>
                                        <input id="edit-telp_instansi" type="telp_instansi" class="form-control ftelp_instansi" name="telp_instansi" value="{{ old('telp_instansi') ?? $user->telp_instansi }}"  autocomplete="telp_instansi">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mx-auto">
                                    <div class="col-md-12">
                                        <label for="alm_instansi">Alamat instansi</label>
                                        <input id="edit-alm_instansi" type="alm_instansi" class="form-control falm_instansi" name="alm_instansi" value="{{ old('alm_instansi')  ?? $user->alm_instansi }}"  autocomplete="alm_instansi">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset  id="tab031-edit">
                        <div class="bg-white">
                            <h4 class="text-center mb-4 mt-0 py-4 text-dark font-weight-bold">Tambah Informasi</h4>
                        </div>
                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                                <label for="username">Username</label>
                                <input id="edit-username" type="text" class="form-control" name="username" value="{{ old('username') ?? $user->username}}" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                            <label for="role">Level User</label>
                                <select id="edit-role" class="form-control" name="role" id="role">
                                    <option disabled selected>Pilih level user</option>
                                    <option value="user"
                                        {{ (old('role') ?? $user->role) == 'user' ? 'selected' : '' }}>
                                        User
                                    </option>
                                    <option value="admin"
                                        {{ (old('role') ?? $user->role) == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="super admin"
                                        {{ (old('role') ?? $user->role) == 'super admin' ? 'selected' : '' }}>
                                        Super Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="line"></div>
                        <div class="modal-footer bg-light-blue d-flex justify-content-end">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success radius-10 btn-block btn-simpan-edit" data-role="{{ $user->role }}">
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

@endsection


@push('script')
    <script>
        // Javascript Hapus User
        $(document).on('click', '.hapus', function () {
            let dataId = $(this).data('id');
            let dataNama = $(this).data('nama');
            let dataRole = $(this).data('role');

            Swal.fire({
                title: 'Anda Yakin hapus user </br>'+dataNama+'?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'DELETE',
                        url:`/users/${dataId}`,
                        success:function(){
                            console.log('data sudah berhasil dihapus');
                            Swal.fire(
                                'Berhasil dihapus!',
                                'User '+dataNama+' terhapus',
                                'success'
                            )

                            if (dataRole == 'users') {
                                window.location.assign('/users');
                            }else{
                                window.location.assign('/users-dinas');
                            }
                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                }
            })
        });
        // Akhir Javascript Hapus User

        // Javascript Edit User
        $(document).on('click', '.edit', function(){
            $('#modal-edit-user').modal('show');
        });

        $(".tabs").click(function(){
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");
            $(".tabs h6").addClass("text-muted");
            $(this).children("h6").removeClass("text-muted");
            $(this).children("h6").addClass("font-weight-bold");
            $(this).addClass("active");

            current_fs = $(".active");

            next_fs = $(this).attr('id');
            next_fs = "#" + next_fs + "1-edit";

            $("fieldset").removeClass("show2");
            $(next_fs).addClass("show2");

                current_fs.animate({}, {
                    step: function() {
                        current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                        });
                        next_fs.css({
                        'display': 'block'
                        });
                    }
                });
        });

        $('.btn-simpan-edit').click( function(){
            let id = $('#form-edit-user').find('#user_id').val();
            let form_data = $('#form-edit-user').serialize();
            let dataRole = $(this).data('role');

            $.ajax({
                url:`/users/${id}`,
                method:'PATCH',
                data:form_data,
                success: function(data){
                    $('#modal-edit-user').modal('hide');

                    iziToast.success({
                        title: 'User Berhasil Diperbarui',
                        message: data.name,
                    });

                    if (dataRole == 'users') {
                        window.location.assign('/users-dinas');
                    }else{
                        window.location.assign('/users');
                    }
                },
                error:function(error){
                    console.log(error.responseText)
                    const errors = error.responseJSON.errors
                        const firstItem = Object.keys(errors)[0]
                        const firstItemDOM = document.getElementById('edit-'+firstItem)
                        const firstErrorMessage = errors[firstItem][0]

                        console.log(firstErrorMessage);
                        console.log(firstItemDOM);

                        clearErrors()

                        // show the error message
                        firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                        // highlight the form control with the error
                        firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            })
        })
        // Akhir Javascript Edit User

        function clearErrors() {
            // remove all error messages
            const errorMessages = document.querySelectorAll('.text-danger')
            errorMessages.forEach((element) => element.textContent = '')
            // remove all form controls with highlighted error text box
            const formControls = document.querySelectorAll('.form-control')
            formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
        }
    </script>
@endpush
