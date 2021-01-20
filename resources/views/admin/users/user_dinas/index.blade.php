@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-body">
                <div class="container p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="card-title mr-auto">Daftar User Dinas</h3>
                        </div>
                        @role('super admin')
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control d-block" id="fnip" placeholder="Masukan NIP" autocomplete="fnip">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn tombol col-12 d-none d-xl-block d-md-block btn-tambah-user">
                                            <i class="fas fa-plus mr-2"></i> Tambah
                                        </button>
                                        <button type="submit" class="btn tombol col-6 d-block d-md-none m-auto btn-tambah-user">
                                            <i class="fas fa-plus mr-2"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endrole
                    </div>
                </div>

                @include('admin.components.modal')

                <div class="table-responsive">
                    <table id="tabel_user_dinas" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NIP</th>
                                    <th>Name </th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                    </table>
                </div>
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
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nip',
                        name: 'nip'
                    },
                    {
                        data: 'name',
                        name: 'nama'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        width: "10%"
                    },
                ],

                order: [
                    [3, 'desc']
                ]
            });
        });


        // Javascript Tambah User
        $('.btn-tambah-user').on('click', function(){
            const nip = $('#fnip').val();
            console.log(nip);
            const url = "http://simpeg.bkd.jatengprov.go.id/webservice/identitas?nip="+nip;


            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'accept': 'application/json',
                        'Access-Control-Allow-Credentials' : true,
                        'Access-Control-Allow-Origin':'*',
                        'Access-Control-Allow-Methods':'GET',
                        'Access-Control-Allow-Headers':'X-CSRF-TOKEN',
                    },
                url: url,
                method: "GET",
                dataType: 'json',
                crossDomain: true,
                success: function(data){
                    if(nip == ''){
                        iziToast.warning({
                            title: 'Peringatan!',
                            message: 'Silahkan Masukan NIP',
                            position: 'bottomCenter'
                        });
                    }else if(!$.trim(data)){
                        $('.fname').val('');
                        $('.femail').val('');
                        iziToast.error({
                            title: 'Maaf!',
                            message: 'NIP Tidak Terdaftar',
                            position: 'bottomCenter'
                        });
                    }else{
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Menampilkan Data',
                            position: 'bottomCenter'
                        });
                        $('#modal-data-user').modal('show');
                        $('.fnip').val(nip);
                        $('.fname').val(data.nama);
                        $('.funit_kerja').val(data.unitkerja);
                        $('.fjabatan').val(data.jabatan);
                        $('.fno_hp').val(data.hp);
                        $('.femail').val(data.email);

                        $('.finstansi').val(data.instansi);
                        $('.finstansi_induk').val(data.instansiinduk);
                        $('.falm_instansi').val(data.alamatkantor);
                        $('.ftelp_instansi').val(data.notelpkantor);
                    }


                },
                error: function(error){
                    iziToast.error({
                            title: 'Error!',
                            message: 'Maaf terjadi kesalahan',
                        });
                }
            });


            if($("#form-tambah-user").length > 0){
                $("#form-tambah-user").validate({
                    submitHandler: function(form){
                        let actionType = $(".btn-simpan").val();
                                            $(".btn-simpan").html('<i class="fas fa-sync-alt mr-2"></i>Menyimpan...');

                        $.ajax({
                            data: $('#form-tambah-user').serialize(),
                            url: `/users`,
                            method: 'POST',
                            dataType: 'json',
                            success: function(data){
                                console.log(data);
                                $('#modal-data-user').modal('hide');
                                $(".btn-simpan").html('<i class="fas fa-save mr-2"></i>Simpan');

                                var table = $('#tabel_user_dinas').DataTable();
                                            table.ajax.reload(null, false);

                                $('.form-control').val('');

                                iziToast.success({
                                    title: data.username,
                                    message: 'Berhasil Ditambahkan',
                                });

                                clearErrors();
                            },

                            error:function(error){
                                console.log(error);
                                $(".btn-simpan").html('<i class="fas fa-save mr-2"></i>Simpan');

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

        // Detail User
        $(document).on('click', '.detail', function(){
            let Id = $(this).data('id');
            window.location.assign(`/users/${Id}`);

        });
    </script>
@endpush
