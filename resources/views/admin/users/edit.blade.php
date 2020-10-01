<form method="POST" action="{{ route('users.update',['user' => $user->id]) }}">
    @method('PATCH')
    @csrf
<div class="modal-header">
    <h5 class="modal-title text-capitalize"><strong>Edit data {{ $user->name  }}</strong></h5>
    <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
        <i class="fas fa-times-circle text-light"></i>
    </button>
</div>
<div class="modal-body">
        <div class="form-group row mx-auto">
            <div class="col-md-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}"  autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mx-auto">
            <div class="col-md-12">
            <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}"  autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mx-auto">
            <div class="col-md-12">
            <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mx-auto">

            <div class="col-md-12">
            <label for="role">Role</label>
                <select id="my-select" class="form-control" name="role" id="role">
                    <option disabled selected>Choose one!</option>
                    <option value="user"
                        {{(old('role') ?? $user->role)== 'user' ? 'selected': ''}}>
                        User
                    </option>
                    <option value="admin"
                        {{(old('role') ?? $user->role)== 'admin' ? 'selected': ''}}>
                        Admin
                    </option>
                    <option value="super admin"
                        {{(old('role') ?? $user->role)== 'super admin' ? 'selected': ''}}>
                        Super Admin
                    </option>
                </select>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary px-5">
        Update
    </button>
</div>
</form>
