@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-body">
                <div class="pt-2 pb-4 d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Indikator</h3>

                    @include('admin.components.modal')
                    @role('super admin')
                        <button type="button" class="btn tombol d-none d-xl-block d-md-block" id="btn-add">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>

                        <button type="button" class="btn tombol d-block d-md-none" id="btn-add">
                            <i class="fas fa-plus"></i>
                        </button>
                    @endrole
                </div>
                <div class="table-responsive">
                <table id="tabel_indikator" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Indikator</th>
                            <th>Keterangan</th>
                            <th>User Dinas</th>
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
        $(document).ready(function(){
            $('#btn-add').click(function(){
                window.location.assign('/indikators/create')
            });

            $('#tabel_indikator').DataTable({
                processing: true,
                serverside: true,
                ajax:{
                    url: `/indikators`,
                    type: 'GET'
                },
                columns: [
                    {
                        data:'id',
                        name: 'id'
                    },
                    {
                        data:'nama_indikator',
                        name: 'nama indikator'
                    },
                    {
                        data:'ket_indikator',
                        name: 'keterangan indikator'
                    },
                    {
                        data:'users',
                        name: 'users.username'
                    },
                    {
                        data:'aksi',
                        name: 'aksi'
                    },
                ],

                order:[
                    [0, 'asc']
                ]
            });
        });

        $(document).on('click','.btn-detail', function(){
            let dataId = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                url: `/indikators/${dataId}`,
                success:function(data){
                    window.location =`/indikators/${dataId}`
                },
                error: function(error){
                    console.log(error)
                }
            })
        });
    </script>
@endpush
