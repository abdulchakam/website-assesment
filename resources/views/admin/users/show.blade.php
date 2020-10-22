@extends('admin.index')

@section('content')

@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif

@include('admin/components/modal')
<!-- Row -->
<div class="row">
    <div class="col-8 mt-2 mx-auto d-block">
        <!-- Card -->
        <div class="card pb-5 card-custom">
            <div class="card-body card-custom">
                <div class="top-background">
                    <div class="label-role badge badge-pill text-white">
                        {{ $user->role }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('template/assets/images/users/profile-pic.jpg') }}"
                        alt="user" class="rounded-circle mx-auto d-block img-thumbnail border-0 photo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="font-weight-medium text-center mt-3 text-name">{{ $user->name }}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center text-monospace text-muted">{{ $user->email }}</h5>
                    </div>
                </div>
            </div>

            @role('super admin')
                <div class="d-flex justify-content-center mt-3">
                    <div class="button-delete">
                        {{-- <form action="{{ route('users.destroy',['user'=> $user->id]) }}" method="post" id="action-delete-user">
                            @method('DELETE')
                            @csrf --}}
                            <button type="button" class="btn btn-outline-danger btn-rounded btn-sm px-4 mx-2 d-none d-xl-block d-md-block"
                                    data-id="{{ $user->id }}" data-nama="{{ $user->name }}" data-role="{{ $user->role }}" id="btn-hapus-user">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                            {{-- Visible mobile Only --}}
                            <button type="sumbit" class="btn btn-outline-danger btn-circle btn-sm mx-2 d-block d-md-none">
                                <i class="fas fa-trash"></i>
                            </button>
                        {{-- </form> --}}
                    </div>

                    <div class="button-edit">
                        <a href="#" data-target="#modal-edit" data-toggle="modal" data-id="{{ $user->id }}"
                            class="btn btn-outline-primary btn-rounded btn-sm px-4 mx-2 btn-edit d-none d-xl-block d-md-block">
                            <i class="fas fa-edit"></i>Edit
                        </a>
                        <a href="#" data-target="#modal-edit" data-toggle="modal" data-id="{{ $user->id }}"
                            class="btn btn-outline-primary btn-circle btn-sm  mx-2 btn-edit d-block d-md-none">
                                <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <div class="btn-reset-pass">
                        <a href="#" data-target="#modal-reset-pass" data-toggle="modal" class="btn btn-outline-warning btn-rounded btn-sm px-4 mx-2 d-none d-xl-block d-md-block btn-reset">
                            <i class="fas fa-undo-alt"></i> Reset Password
                        </a>
                        <a href="#" class="btn btn-outline-warning btn-circle btn-sm  mx-2 d-block d-md-none btn-reset">
                            <i class="fas fa-undo-alt"></i>
                        </a>
                    </div>
                </div>
            @endrole
        <!-- Card -->
    </div>
</div>
<!-- End Row -->

{{-- Modal Edit Data --}}
<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
{{-- Akhir Modal Edit Data --}}

{{-- Modal Reset Password --}}
<div id="modal-reset-pass" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
{{-- Akhir Modal Reset Password --}}
@endsection
