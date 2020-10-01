@extends('admin.index')

@section('content')
@if (session()->has('pesan'))
    <div class="alert alert-success">
        {{ session()->get('pesan') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="pt-2 pb-4 d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Indikator</h3>

                    @include('admin.components.modal')
                    <a class="sidebar-link btn btn-gradient custom-radius d-none d-xl-block d-md-block"
                        href="{{ route('indikators.create') }}" aria-expanded="false">
                        <i data-feather="plus" class="feather-icon"></i>
                        <span class="hide-menu">Buat Indikator</span>
                    </a>
                    <a class="sidebar-link btn btn-gradient btn-circle d-block d-md-none btn-add"
                        href="{{ route('indikators.create') }}" aria-expanded="false">
                        <i data-feather="plus" class="feather-icon"></i>
                    </a>
                </div>
                <div class="table-responsive">
                <table table id="zero_config" class="table table-striped no-wrap table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Indikator</th>
                            <th>Keterangan</th>
                            <th>User Dinas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indikators as $indikator)
                        <tr>
                            <td><div class="text-center">{{ $loop->iteration }}</div></td>
                            <td><a href="{{ route('indikators.show',['indikator' => $indikator->id]) }}" class="font-weight-bold">
                                    {{ $indikator->nama_indikator }}
                                </a>
                            </td>
                            <td>{{ $indikator->ket_indikator }}</td>
                            <td>
                                @foreach ($indikator->users as $user)
                                    {{ $user->username }} </br>
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
