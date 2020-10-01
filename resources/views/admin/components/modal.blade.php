<!-- Modal -->
<div id="modal-add-user" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="multiple-oneModalLabel">Add User</h4>
            <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
        </div>
        <div class="modal-body ">
            <form id="form-add-user">
                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                        <span class="invalid-feedback" id="name_error"></span>
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
                            <span class="invalid-feedback" id="username_error"></span>
                    </div>
                </div>

                <div class="form-group row mx-auto">
                    <div class="col-md-12">
                    <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                            <span class="invalid-feedback"id="email_error"></span>
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
                        <span class="invalid-feedback"id="role_error"></span>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="col-6">
                        <div class="form-group row mx-auto">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                <span class="invalid-feedback"id="password_error"></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row mx-auto">
                            <label for="password_confirm">{{ __('Confirm Password') }}</label>
                            <input id="password_confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            <span class="invalid-feedback"id="password_confirm_error"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary px-5 btn-save-user">
                        Tambah
                    </button>
                </div>

            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- SignIn modal content -->
<div id="modal-show" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>

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
