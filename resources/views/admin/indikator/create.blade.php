@extends('admin.index')

@section('content')
@include('admin.indikator.modal')
<div class="row">
    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
        <div class="multisteps-form__progress">
            <button class="multisteps-form__progress-btn js-active" type="button"> <i class="fas fa-check-circle"></i> Tahap 1</button>
            <button class="multisteps-form__progress-btn" type="button"> <i class="fas fa-check-circle"></i> Tahap 2</button>
            <button class="multisteps-form__progress-btn" type="button"> <i class="fas fa-check-circle"></i> Tahap 3</button>
        </div>
    </div>
</div>

<form id="form-tambah-indikator" class="multisteps-form__form">
@csrf
    <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="slideHorz">
    <h3 class="multisteps-form__title">Tambah Indikator Baru</h3>
    <hr>
    <br>
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
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-success radius-10 btn-add-domain" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-primary radius-10 btn-edit-domain" disabled='disabled' data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-danger radius-10 btn-hapus-domain" disabled='disabled'>
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
                                    @error('aspek_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-5">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-success radius-10 btn-add-aspek" data-toggle="modal">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-primary radius-10 btn-edit-aspek" disabled='disabled' data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm bg-white shadow-sm text-danger adius-10 btn-hapus-aspek" disabled='disabled'>
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <hr class="mt-2">
    <div class="row">
        <div class="button-row d-flex mt-2 col-12">
        <button class="btn ml-auto js-btn-next tombol" type="button" title="Selanjutnya">
            Selanjutnya <i class=" fas fa-angle-right ml-2"></i>
        </button>
        </div>
    </div>
</div>

<div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
    <br>
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

    <br>
    <hr class="mt-2">
    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
        <button class="btn tombol2 js-btn-prev" type="button" title="Sebelumnya">
            <i class=" fas fa-angle-left mr-2"></i>  Sebelumnya
        </button>
        <button class="btn tombol ml-auto js-btn-next" type="button" title="Selanjutnya">
            Selanjutnya <i class=" fas fa-angle-right ml-2"></i>
        </button>
        </div>
    </div>
</div>

<div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
    <br>
    <div class="multisteps-form__content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="petunjuk">Petunjuk</label>
                        <textarea id="petunjuk" class="form-control  @error('level5') is-invalid @enderror" name="petunjuk"></textarea>
                        @error('petunjuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                            <label for="users">Pilih Dinas</label>
                            <select id="users" class="form-control select-user @error('users') is-invalid @enderror" name="users[]" multiple>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->instansi }} - {{ $user->username }}</option>
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

    <br>
    <hr class="mt-2">
    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
            <button class="btn tombol2 js-btn-prev" type="button" title="Sebelumnya">
                <i class=" fas fa-angle-left mr-2"></i> Sebelumnya
            </button>
            <button class="btn btn-success ml-auto btn-simpan-indikator radius-10" type="submit">
                <i class=" fas fa-save mr-2"></i> Simpan
            </button>
        </div>
    </div>

</div>
</form>
@endsection

@push('script')
    <script>
        $(document).ready( function(){

            CKEDITOR.replace('petunjuk');

            if($('#form-tambah-indikator').length > 0){
                $('#form-tambah-indikator').validate({
                    submitHandler: function(form){
                        let actionType = $('.btn-simpan-indikator').val();
                                            $('.btn-simpan-indikator').html('<i class="fas fa-sync-alt mr-2"></i>Menyimpan...');

                        CKEDITOR.instances.petunjuk.updateElement();
                        const form_data = $('#form-tambah-indikator').serialize();

                        $.ajax({
                            data: form_data,
                            url: `/indikators`,
                            type: 'POST',
                            dataType: 'json',

                            success: function(data){
                                console.log('Berhasil');
                                window.location.assign('/indikators');
                                iziToast.success({
                                    title: 'Indikator Berhasil Disimpan',
                                    message: data.nama_indikator,
                                });
                            },
                            error: function(error){
                                console.log(error);
                                $(".btn-simpan-indikator").html('<i class="fas fa-save mr-2"></i>Simpan');
                                const errors = error.responseJSON.errors
                                const firstItem = Object.keys(errors)[0]
                                const firstItemDOM = document.getElementById(firstItem)
                                const firstErrorMessage = errors[firstItem][0]

                                console.log(firstErrorMessage);
                                console.log(firstItemDOM);

                                clearErrors()

                                // show the error message
                                firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                                // highlight the form control with the error
                                firstItemDOM.classList.add('border', 'border-danger','is-invalid')

                                iziToast.warning({
                                    title: 'Gagal Menyimpan!',
                                    message: 'Silahkan Cek Kembali',
                                });
                            }
                        });
                    }
                });
            }
        });

        function clearErrors() {
                // remove all error messages
                const errorMessages = document.querySelectorAll('.text-danger')
                errorMessages.forEach((element) => element.textContent = '')
                // remove all form controls with highlighted error text box
                const formControls = document.querySelectorAll('.form-control')
                formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
            }
    </script>
@endpush



