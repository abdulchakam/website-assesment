@extends('admin.index')

@section('content')

@include('admin.indikator.modal')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="card-title">
                <h4>Detail {{ $indikator->nama_indikator }}</h4>
                {{ $indikator->ket_indikator }}
            </div>
            <div class="">
                <button type="button" class="btn btn-rounded btn-info btn-sm px-2 mt-3 d-none d-xl-block d-md-block" data-toggle="modal" data-target="#modal-petunjuk">
                    <i class="fas fa-info-circle"></i>
                    Petunjuk
                </button>
                <button type="button" class="btn btn-circle btn-info d-block d-md-none" data-toggle="modal" data-target="#modal-petunjuk">
                    <i class="fas fa-info-circle fa-lg"></i>
                </button>
            </div>
        </div>


    </div>
    <div class="card-body">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Domain</td>
                            <td>:</td>
                            <td>{{ $indikator->domain->ket_domain }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Aspek</td>
                            <td>:</td>
                            <td>{{ $indikator->aspek->ket_aspek }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Pertanyaan</td>
                            <td>:</td>
                            <td>{{ $indikator->pertanyaan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless table-sm">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">User</td>
                            <td>:</td>
                            <td>
                                <ul class="mr-auto">
                                    @foreach ($indikator->users as $user)
                                        <li>{{ $user->instansi }} </li>
                                    @endforeach
                                </ul>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold w-10">Level 0</td>
                            <td class="w-5">:</td>
                            <td class="w-75">{{ $indikator->level0 }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Level 1</td>
                            <td>:</td>
                            <td>{{ $indikator->level1 }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Level 2</td>
                            <td>:</td>
                            <td>{{ $indikator->level2 }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Level 3</td>
                            <td>:</td>
                            <td>{{ $indikator->level3 }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Level 4</td>
                            <td>:</td>
                            <td>{{ $indikator->level4 }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Level 5</td>
                            <td>:</td>
                            <td>{{ $indikator->level5 }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="card-footer">
        @role('super admin')
            <div class="d-flex justify-content-end">
                <button class="btn btn-danger radius-10 mx-2 btn-hapus-indikator" data-id="{{ $indikator->id }}" data-nama="{{ $indikator->nama_indikator }}">
                    <i class="fa fa-trash"></i>
                    Hapus
                </button>
                <button type="button" class="btn edit btn-primary radius-10 mx-2" data-id="{{ $indikator->id }}"> <i class="fas fa-edit mr-2"></i> Edit</button>
            </div>
        @endrole
    </div>
</div>

<div id="modal-petunjuk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="my-modal-title">Petunjuk {{ $indikator->nama_indikator }}</h4>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! $indikator->petunjuk !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
            // Javascript Edit User
    $(document).on('click', '.edit', function(){
        let dataId = $(this).data('id');
        window.location.assign(`/indikators/${dataId}/edit`)
    });
    // Javascript Hapus User
    $(document).on('click', '.btn-hapus-indikator', function () {
        let dataId = $(this).data('id');
        let dataNama = $(this).data('nama');

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
                    url:`/indikators/${dataId}`,
                    success:function(){
                        console.log('data sudah berhasil dihapus');
                        Swal.fire(
                            'Berhasil dihapus!',
                            'User '+dataNama+' terhapus',
                            'success'
                        )

                        window.location.assign('/indikators');
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            }
        })
    });
    // Akhir Javascript Hapus User
</script>
@endpush
