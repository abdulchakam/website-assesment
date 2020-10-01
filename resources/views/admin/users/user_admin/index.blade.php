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
                <h3 class="card-title mr-auto">Data User Admin</h3>

                @include('admin.components.modal')
                <button type="button" class="btn btn-gradient custom-radius d-none d-xl-block d-md-block btn-add-user" data-toggle="modal" data-target="#add-user">
                    <i data-feather="plus" class="feather-icon"></i>
                    Add Admin
                </button>
                <button type="button" class="btn btn-gradient btn-circle d-block d-md-none btn-add" data-toggle="modal" data-target="#add-user">
                    <i data-feather="plus" class="feather-icon"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped no-wrap table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th colspan="2">Info Basic</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('template/assets/images/users/profile-pic.jpg') }}"
                                        alt="user" class="rounded-circle mx-auto d-block" width="40">
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show',['user' => $user->id]) }}"" class="btn-show" >
                                            <strong> {{ $user->name }} </strong>
                                            <p class="text-monospace text-muted">{{ $user->email }}</p>
                                        </a>
                                    </td>
                                    <td> {{ $user->username }} </td>
                                    <td> {{ $user->role }} </td>
                                    <td> {{ $user->created_at->format('d, M Y') }} </td>
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
