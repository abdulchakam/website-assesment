@extends('admin.index')

@section('content')
@include('admin.indikator.modal')
<div class="row">
    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
        <div class="multisteps-form__progress">
            <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">User Info</button>
            <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
            <button class="multisteps-form__progress-btn" type="button" title="Order Info">Order Info</button>
            <button class="multisteps-form__progress-btn" type="button" title="Message">Message</button>
        </div>
    </div>
</div>

<form action="{{ route('indikators.store') }}" method="post" class="multisteps-form__form">
@csrf
    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
    <h3 class="multisteps-form__title">Your User Info</h3>
    <div class="multisteps-form__content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_indikator">Nama Indikator</label>
                        <input id="nama_indikator" class="form-control @error('nama_indikator') is-invalid @enderror"
                                type="text" name="nama_indikator" value="{{ old('nama_indikator') }}"  autocomplete="nama_indikator" autofocus>
                                @error('nama_indikator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <label for="ket_indikator" class="mt-3">Keterangan Indikator</label>
                        <input id="ket_indikator" class="form-control @error('ket_indikator') is-invalid @enderror"
                                type="text" name="ket_indikator" value="{{ old('ket_indikator') }}"  autocomplete="ket_indikator" autofocus>
                                @error('ket_indikator')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <textarea id="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror"
                                    type="text" name="pertanyaan" rows="5">{{ old('pertanyaan') }}</textarea>
                                    @error('pertanyaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="domain_id">Domain</label>
                        <select id="domain_id" class="form-control @error('domain_id') is-invalid @enderror" name="domain_id">
                            <option disabled selected>=== Pilih Domain ===</option>
                            @foreach ($domains as $domain)
                                <option value="{{ $domain->id }}">
                                    {{ $domain->nama_domain }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" id="ket_domain" class="form-control mt-2" readonly>
                                    @error('domain_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-5">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-outline-success btn-rounded btn-add-domain" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-edit-domain" disabled='disabled' data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger btn-rounded btn-hapus-domain" disabled='disabled'>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aspek_id">Aspek</label>
                        <select id="aspek_id" class="form-control @error('aspek_id') is-invalid @enderror" name="aspek_id">
                            <option disabled selected>=== Pilih Aspek ===</option>
                            @foreach ($aspeks as $aspek)
                                <option value="{{ $aspek->id }}">{{ $aspek->nama_aspek }}</option>
                            @endforeach
                        </select>
                        <input type="text"  id="ket_aspek" class="form-control mt-2" readonly>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-5">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-sm btn-outline-success btn-rounded btn-add-aspek" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-edit-aspek" disabled='disabled' data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger btn-rounded btn-hapus-aspek" disabled='disabled'>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
        </div>
    </div>
</div>

<div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
    <h3 class="multisteps-form__title">Your User Info</h3>
    <div class="multisteps-form__content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level0">Level 0</label>
                        <textarea id="level0" class="form-control @error('level0') is-invalid @enderror"
                                    type="text" name="level0" rows="2">{{ old('level0') }}</textarea>
                                @error('level0')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level1">Level 1</label>
                        <textarea id="level1" class="form-control @error('level1') is-invalid @enderror"
                                    type="text" name="level1" rows="2">{{ old('level1') }}</textarea>
                                @error('level1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level2">Level 2</label>
                        <textarea id="level2" class="form-control @error('level2') is-invalid @enderror"
                                    type="text" name="level2" rows="2">{{ old('level2') }}</textarea>
                                @error('level2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level3">Level 3</label>
                        <textarea id="level3" class="form-control @error('level3') is-invalid @enderror"
                                    type="text" name="level3" rows="2">{{ old('level3') }}</textarea>
                                @error('level3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level4">Level 4</label>
                        <textarea id="level4" class="form-control @error('level4') is-invalid @enderror"
                                    type="text" name="level4" rows="2">{{ old('level4') }}</textarea>
                                @error('level4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="level5">Level 5</label>
                        <textarea id="level5" class="form-control @error('level5') is-invalid @enderror"
                                    type="text" name="level5" rows="2">{{ old('level5') }}</textarea>
                                @error('level5')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
        </div>
    </div>
</div>

<div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
    <h3 class="multisteps-form__title">Your User Info</h3>
    <div class="multisteps-form__content">
        <div class="container">
            <div class="form-group">
                <label for="petunjuk">Petunjuk</label>
                <textarea id="petunjuk" class="form-control  @error('level5') is-invalid @enderror" name="petunjuk"></textarea>
                @error('petunjuk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                            <label for="users">User</label>
                            <select id="users" class="form-control select-user @error('users') is-invalid @enderror" name="users[]" multiple>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('users')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
            <button class="btn ml-auto btn-success" type="submit">Tambah</button>
        </div>
    </div>

</div>
</form>
@endsection

@push('script')
    <script>
        // CKEditor
        $(document).ready(function () {
            CKEDITOR.replace('petunjuk');
        });
    </script>
@endpush



