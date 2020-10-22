@extends('admin.index')

@section('content')

@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pt-2 pb-4 d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Data User Dinas</h3>

                    @include('admin.components.modal')
                    @role('super admin')
                        <button type="button" class="btn btn-gradient custom-radius d-none d-xl-block d-md-block btn-add-user" data-toggle="modal" data-target="#modal-tambah-user">
                            <i data-feather="plus" class="feather-icon"></i>
                            Add Dinas
                        </button>
                        <button type="button" class="btn btn-gradient btn-circle d-block d-md-none" data-toggle="modal" data-target="#modal-tambah-user">
                            <i data-feather="plus" class="feather-icon"></i>
                        </button>
                    @endrole
                </div>
                <div class="table-responsive">
                    <table id="tabel_user_dinas" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name </th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah User-->
<div id="modal-tambah-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="multiple-oneModalLabel">Tambah User Dinas</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body ">
                <form id="form-tambah-user">
                    <div class="form-group row mx-auto">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row mx-auto">
                        <div class="col-md-12">
                        <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

                        </div>
                    </div>

                    <div class="form-group row mx-auto">
                        <div class="col-md-12">
                        <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row mx-auto">

                        <div class="col-md-12">
                        <label for="role">Role</label>
                            <select id="role" class="form-control" name="role" id="role">
                                <option disabled selected>Choose one!</option>
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

                    <div class="row mx-auto">
                        <div class="col-6">
                            <div class="form-group row mx-auto">
                                <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row mx-auto">
                                <label for="password_confirm">{{ __('Confirm Password') }}</label>
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary px-5 btn-simpan">
                            Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit User-->
<div id="modal-edit-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize"><strong>Edit data</strong></h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-light"></i>
                </button>
            </div>
            <div class="modal-body ">
                <form method="POST" id="form-edit-user">
                    @method('PATCH')
                    @csrf
                <input type="hidden" id="id_user" class="id_user">
                <div class="modal-body">
                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input id="edit-name" type="text" class="form-control name" name="name"  autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                            <label for="username">Username</label>
                                <input id="edit-username" type="text" class="form-control username" name="username" autocomplete="username" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mx-auto">
                            <div class="col-md-12">
                            <label for="email">Email</label>
                                <input id="edit-email" type="email" class="form-control email" name="email" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row mx-auto">

                            <div class="col-md-12">
                            <label for="role">Role</label>
                                <select id="my-select" class="form-control role" name="role" id="role">
                                    <option disabled selected>Choose one!</option>
                                    <option value="user">
                                        User
                                    </option>
                                    <option value="admin">
                                        Admin
                                    </option>
                                    <option value="super admin">
                                        Super Admin
                                    </option>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-5" id="btn-simpan-edit">
                        Update
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        // Javascript Datatables
            $(document).ready(function(){
            $('#tabel_user_dinas').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: `/users-dinas`,
                    type: 'GET'
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'created_at',
                        name: 'created at'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ],

                order: [
                    [3, 'desc']
                ]
            });
        });


        // Javascript Tambah User
        $('.btn-add-user').on('click', function(){
            $('#modal-tambah-user').modal('show');

            if($("#form-tambah-user").length > 0){
                $("#form-tambah-user").validate({
                    submitHandler: function(form){
                        let actionType = $(".btn-simpan").val();
                                            $(".btn-simpan").html('Sending...');
                        $.ajax({
                            data: $('#form-tambah-user').serialize(),
                            url: `/users`,
                            type: "POST",
                            dataType: 'json',

                            success: function(data){
                                $('#form-tambah-user').trigger('reset');
                                $('#modal-tambah-user').modal('hide');

                                console.log('berhasil');
                                var table = $('#tabel_user_dinas').DataTable();
                                table.ajax.reload( null, false );
                                $(".btn-simpan").html('Simpan');

                                console.log(data);
                                iziToast.success({
                                    title: 'User Berhasil Ditambahkan',
                                    message: data.name,
                                });
                            },
                            error: function(error){
                                console.log(error);
                                $(".btn-simpan").html('Simpan');
                                const errors = error.responseJSON.errors
                                const firstItem = Object.keys(errors)[0]
                                const firstItemDOM = document.getElementById(firstItem)
                                const firstErrorMessage = errors[firstItem][0]

                                console.log(firstErrorMessage);

                                clearErrors()

                                // show the error message
                                firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                                // highlight the form control with the error
                                firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                            }
                        });
                    }
                });
            }
        });


        function clearErrors() {
                // remove all error messages
                const errorMessages = document.querySelectorAll('.text-danger')
                errorMessages.forEach((element) => element.textContent = '')
                // remove all form controls with highlighted error text box
                const formControls = document.querySelectorAll('.form-control')
                formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
            }
        // Akhir Javascript Tambah User

                // Javascript Edit User
                $(document).on('click', '.edit', function () {
                let dataId = $(this).data('id');
                console.log(dataId);

            $.get('users/'+dataId+'/edit', function(data){
                $('#modal-edit-user').modal('show');

                $('.id_user').val(data.id);
                $('.name').val(data.name);
                $('.username').val(data.username);
                $('.email').val(data.email);
                $('select').val(data.role);
            });
        });

        $(document).on('click', '#btn-simpan-edit', function(){
            let id = $('#form-edit-user').find('#id_user').val();
            let form_data = $('#form-edit-user').serialize();

            $.ajax({
                url:`/users/${id}`,
                method:'PATCH',
                data:form_data,
                success: function(data){
                    $('#modal-edit-user').modal('hide');
                    console.log('berhasil');
                    console.log(data);
                    var table = $('#tabel_user_dinas').DataTable();
                                table.ajax.reload( null, false );
                    iziToast.success({
                        title: 'User Berhasil Diperbarui',
                        message: data.name,
                    });
                },
                error:function(error){
                    console.log(error)
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


        // Javascript Hapus User
        $(document).on('click', '.delete', function () {
            let dataId = $(this).attr('id');
            let dataNama = $(this).data('nama');
            console.log(dataId);
            console.log(dataNama);

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

                            var table = $('#tabel_user_dinas').DataTable();
                                table.ajax.reload( null, false );

                        },
                        error:function(error){
                            console.log(error);
                        }
                    });
                }
            })
        });
        // Javascript Hapus User
    </script>
@endpush
