@extends('layouts.app')

@section('content')

@include('navbar')

<div class="row mt-2">
    <div class="col-md-3">
        <div style="height: 100vh;">
            <div class="w-100 h-100 d-inline-block bg-white p-2">
                @foreach ($user as $data)
                <div class="container">
                    <h5 class="font-weight-medium mx-3 my-3">User Informasi</h5>
                    <hr class="mb-3">

                    <div class="row">
                        <div class="col-md-12">
                            @if (empty(Auth::user()->avatar))
                                <img src="{{ asset('/img/avatar/default-avatar.png') }}" width="100" class="bg-white border rounded-circle mx-auto d-block">
                            @else
                                <img src="{{ asset('/img/avatar/'.Auth::user()->avatar) }}" width="100" class="bg-white border rounded-circle mx-auto d-block">
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-10 pl-4">
                            <div class="form-group mt-2">
                                <h6 class="text-muted font-weight-normal mb-1 w-100 text-truncate">Nama : </h6>
                                <p class="font-weight-medium">{{ $data->name }}</p>
                            </div>
                            <div class="form-group mt-2">
                                <h6 class="text-muted font-weight-normal mb-1 w-100 text-truncate ">Username : </h6>
                                <p class="font-weight-medium">{{ $data->username }}</p>
                            </div>
                            <div class="form-group mt-2">
                                <h6 class="text-muted font-weight-normal mb-1 w-100 text-truncate">Instansi : </h6>
                                <p class="font-weight-medium">{{ $data->instansi }}</p>
                            </div>
                            <div class="form-group mt-2">
                                <h6 class="text-muted font-weight-normal mb-1 w-100 text-truncate font-13">Email : </h6>
                                @if (empty($data->email))
                                    <p class="font-weight-medium">-</p>
                                @endif
                                    <p class="font-weight-medium">{{ $data->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12 pr-4">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary radius-10 btn-perbarui" data-id="{{ $data->id }}"> <i class="fas fa-edit fa-sm mr-2"></i> Perbarui</button>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-md-9 px-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 p-4">
                        <div class="card-custom bg-white shadow-sm p-4">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h2 class="text-dark font-weight-medium">{{ count($indikators) }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Indikator</h6>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-question-circle large-icon m-auto text-light"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-4">
                        <div class="card-custom bg-white shadow-sm p-4">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h2 class="text-dark font-weight-medium">{{ count($rekaps) }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Indikator Terisi</h6>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-check-circle large-icon m-auto text-light"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 p-4">
                        <div class="card-custom bg-white shadow-sm p-4">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h2 class="text-dark font-weight-medium">{{ count($files) }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah File Upload</h6>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-file-alt large-icon m-auto text-light"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom border-0 shadow-sm pt-4 px-3">
                    <h5 class="card-title mr-auto font-weight-medium">Daftar Indikator</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>Nama Indikator</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($indikators as $indikator)
                                    <input type="hidden" id="indikator_id" value="{{ $indikator->id }}">
                                        <tr>
                                            <td>{{ $indikator->nama_indikator }}</td>
                                            <td>{{ $indikator->ket_indikator }}</td>
                                            <td>
                                                @if ( count(App\Rekap::where('indikator_id', $indikator->id)->get()) === 0)
                                                    <span class="badge badge-pill badge-danger py-1 px-2">
                                                        <i class="fas fa-exclamation-circle mr-2"></i> Belum
                                                    </span>
                                                @else
                                                    <span class="badge badge-pill badge-success py-1 px-2">
                                                        <i class="fas fa-check-circle mr-2"></i> Terisi
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ url('/indikator/'.$indikator->id) }}" method="get">
                                                    <button type="submit" class="btn btn-sm shadow-sm bg-white radius-10 btn-detail btn-action-primary"><i class="fas fa-chevron-right fa-lg"></i></button>
                                                </form>
                                            </td>
                                            @empty

                                            <td colspan="3" class="text-center">
                                                <h5>Indikator Belum Tersedia</h5>
                                            </td>
                                        </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $('.btn-perbarui').click(function(){
            const dataId = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
                url: `/user-detail/${dataId}`,
                success:function(data){
                    window.location =`/user-detail/${dataId}`
                },
                error: function(error){
                    console.log(error)
                }
            });
        });
    </script>
@endpush
