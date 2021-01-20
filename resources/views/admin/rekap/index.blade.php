@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-body">
                <div class="pt-2 pb-4 d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Data Rekap Indikator</h3>

                    @include('admin.components.modal')
                </div>
                <div class="table-responsive">
                    <table id="tabel_rekap" class="table table-striped display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Indikator </th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>User</th>
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
            $('#tabel_rekap').DataTable({
                processing: true,
                serverside: true,
                ajax: {
                    url: `/rekaps`,
                    type: 'GET'
                },
                columns: [
                    { data: 'id',               name: 'id'},
                    { data: 'nama_indikator',   name: 'nama_indikator'},
                    { data: 'ket_indikator',    name: 'ket_indikator'},
                    { data: 'status',           name: 'status'},
                    { data: 'users',            name: 'users.username'},
                    { data: 'aksi',             name: 'aksi'},
                ],

            });
        });

        $(document).on('click', '.btn-detail', function(){
            const id = $(this).data('id');

            $.ajax({
                url:`/rekap/${id}`,
                method: 'get',
                success: function(data){
                    window.location =`/rekap/${id}`

                },
                error: function(error){
                    console.log(error);
                    console.log('error')
                }
            })
        })
    </script>
@endpush
