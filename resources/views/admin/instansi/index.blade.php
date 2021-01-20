@extends('admin.index')

@section('content')
<div class="row"></div>
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-body">
                <div class="pt-2 pb-4 d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Daftar Instansi</h3>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped" id="tabel_instansi">
                        <thead>
                            <tr>
                                <th>Nama Instansi</th>
                                <th>Instansi Induk</th>
                                <th>Alamat</th>
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

        // Tampil Instansi
        $('#tabel_instansi').DataTable({
            processing: true,
            serveside: true,
            ajax:{
                url: `/instansi`,
                type: 'GET'
            },
            columns :[
                {
                    data: 'instansi',
                    name: 'nama instansi',

                },
                {
                    data: 'instansi_induk',
                    name: 'instansi Induk',
                },
                {
                    data: 'alm_instansi',
                    name: 'alamat instansi',
                }
            ]
        });
    });
</script>
@endpush
