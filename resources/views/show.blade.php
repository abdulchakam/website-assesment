@extends('layouts.app')

@section('content')

@include('navbar')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @forelse ($indikators as $indikator)
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <a href="{{ url('/')}}"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-primary radius-10 btn-sm mr-2" data-toggle="modal" data-target="#modal-petunjuk">
                                    <i class="fas fa-info-circle mr-2"></i> Petunjuk
                                </button>
                                @if (!$rekap->isEmpty())
                                    <a href="/export-excel/{{ $indikator->id }}" class="btn btn-success btn-sm radius-10 px-4">
                                        <i class="fas fa-file-excel mr-2"></i>
                                        Cetak
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="d-flex justify-content-end">
                                @if (count($rekap))
                                    @foreach ($rekap as $item)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-sm table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-dark">Terakhir diperbarui</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ $item->user->instansi }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-light">{{ $item->updated_at->diffForHumans() }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-indikator-tab" data-toggle="tab" href="#nav-indikator" role="tab" aria-controls="nav-informasi-user" aria-selected="true">{{ $indikator->nama_indikator }}</a>
                                <a class="nav-item nav-link" id="nav-unggah-berkas-tab" data-toggle="tab" href="#nav-unggah-berkas" role="tab" aria-controls="nav-informasi-instansi" aria-selected="false">Unggah Berkas</a>
                            </div>
                        </nav>

                        <form action="" method="post" id="form-submit-update" enctype="multipart/form-data">
                        @csrf
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active mt-4" id="nav-indikator" role="tabpanel" aria-labelledby="nav-indikator-tab">
                                    <div class="text-left">

                                        <input type="hidden" value="{{ $indikator->id }}" name="indikator_id" class="indikator_id">
                                        <input type="hidden" value="{{ $indikator->nama_indikator }}" name="indikator_nama" class="indikator_nama">
                                        <input type="hidden" value="{{ $indikator->domain->id }}" name="domain_id">
                                        <input type="hidden" value="{{ $indikator->aspek->id }}" name="aspek_id">
                                        @foreach ($rekap as $item)
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                        @endforeach
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-25 font-weight-bold nama_indikator">{{ $indikator->nama_indikator }}</td>
                                                                <td> : </td>
                                                                <td>{{ $indikator->ket_indikator }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-25 font-weight-bold">{{ $indikator->domain->nama_domain }}</td>
                                                                <td> : </td>
                                                                <td>{{ $indikator->domain->ket_domain }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-25 font-weight-bold">{{ $indikator->aspek->nama_aspek }}</td>
                                                                <td> : </td>
                                                                <td>{{ $indikator->aspek->ket_aspek }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-25 font-weight-bold">Pertanyaan</td>
                                                                <td> : </td>
                                                                <td>{{ $indikator->pertanyaan }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 my-2">
                                                    <hr>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel0" name="level" value="level0"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level0') ?? $item->pilihan) == 'level0' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel0">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 0</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level0 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel1" name="level" value="level1"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level1') ?? $item->pilihan) == 'level1' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel1">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 1</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level1 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel2" name="level" value="level2"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level2') ?? $item->pilihan) == 'level2' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel2">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 2</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level2 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel3" name="level" value="level3"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level3') ?? $item->pilihan) == 'level3' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel3">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 3</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level3 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel4" name="level" value="level4"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level4') ?? $item->pilihan) == 'level4' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel4">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 4</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level4 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-toolbar">
                                                        <input type="radio" id="radiolevel5" name="level" value="level5"
                                                        @if (count($rekap))
                                                            @foreach ($rekap as $item)
                                                                {{ (old('level5') ?? $item->pilihan) == 'level5' ? 'checked': '' }}
                                                            @endforeach
                                                        @endif
                                                        >
                                                        <label for="radiolevel5">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <span class="w-25 font-weight-bold mr-4">Level 5</span>
                                                                </div>
                                                                <div class="col-md-10">
                                                                    {{ $indikator->level5 }}
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="penjelasan" class="font-weight-bold">Penjelasan</label>
                                                        <textarea class="form-control" type="text" name="penjelasan" rows="3">@foreach ($rekap as $item) {{ $item->penjelasan }}@endforeach</textarea>
                                                        @error('penjelasan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 d-flex justify-content-end mt-4">
                                                @if (count($rekap))
                                                    <button type="button" class="btn btn-primary btn-rounded px-5 btn-submit-update">Perbarui <i class="fas fa-chevron-circle-right fa-lg ml-2"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-rounded px-5 btn-submit-update">Simpan <i class="fas fa-chevron-circle-right fa-lg ml-2"></i></button>
                                                @endif
                                            </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade mt-4" id="nav-unggah-berkas" role="tabpanel" aria-labelledby="nav-unggah-berkas-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label for="berkas" class="font-weight-medium">Berkas Pendukung</label>
                                                <button type="button" class="btn btn-info btn-sm px-4 text-white ml-3 " data-toggle="modal" data-target="#modal-files">
                                                    <i class="fas fa-file mr-2"></i>
                                                    {{ count($files) }} Berkas
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="file-loading">
                                                <input id="files" name="files[]" multiple type="file" @if ($rekap->isEmpty()) disabled @endif>
                                            </div>
                                            <br>
                                            @if ($rekap->isEmpty())
                                                <span>*Sebelum unggah berkas pendukung, silahkan isi indikator terlebih dulu</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                            @empty
                            <h3 class="text-center">Tidak ada indikator...</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>


{{-- Modal Files --}}
<div id="modal-files" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bolder" id="my-modal-title">File Pendukung</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @forelse ($files as $file)
                        <input type="hidden" value="{{ $file->id }}" id="file_id">
                        <table id="table-files" class= "table table-hover">
                            <tbody>
                                <tr>
                                    <td>
                                        @if (substr($file->file_name,-3)== 'pdf')
                                            <i class="fas fa-file-pdf text-danger fa-2x"></i>
                                        @elseif(substr($file->file_name,-3)== 'png')
                                            <i class="fas fa-file-image text-primary fa-2x"></i>
                                        @else
                                            <i class="fas fa-file-image text-danger fa-2x"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{ Str::limit($file->file_name, 35, '...') }}
                                    </td>
                                    <td class="text-right">
                                        <div>
                                            <a href="/download-file/{{ $file->file_name }}" title="{{ $file->file_name }}" class="download-file btn btn-sm mr-2 shadow-sm bg-white rounded">
                                                <i class="fas fa-download text-success"></i>
                                            </a>

                                            <button type="button" title="{{ $file->file_name }}" class="delete-file btn btn-sm shadow-sm bg-white rounded"
                                                onclick='deleteFile({{ $file->id }})'>

                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @empty
                        <h5 class="text-muted">Anda Belum Mengupload Berkas</h5>
                    @endforelse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Akhir Modal Files --}}

{{-- Modal Petunjuk --}}
@foreach ($indikators as $indikator)
<div id="modal-petunjuk" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Petunjuk {{ $indikator->nama_indikator }}
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {!! $indikator->petunjuk !!}
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- Akhir Modal Petunjuk --}}
@endsection

@push('script')
    <script>
        $(function () {

            CKEDITOR.replace('penjelasan');

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                window.history.pushState("", "", url);
                loadDatas(url);
            });

            function loadDatas(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.data').html(data);
                }).fail(function () {
                    console.log("Failed to load data!");
                });
            }
        });

        $(document).on('click', '.btn-submit-update', function(){

            CKEDITOR.instances.penjelasan.updateElement();
            const form_data =  $('#form-submit-update').serialize();

            $.ajax({
                data: form_data,
                url: `/rekaps`,
                method: 'POST',
                success: function(data){
                    console.log('berhasil');
                    iziToast.success({
                        icon: 'far fa-check-circle',
                        title: 'Success, ',
                        message: 'Perubahan Berhasil disimpan',
                    });

                    location.reload();
                },
                error: function(error){
                    console.log(error);
                    iziToast.error({
                        icon: ' far fa-times-circle',
                        title: 'Failed, ',
                        message: 'Perubahan Gagal disimpan',
                    });
                    const errors = error.responseJSON.errors;
                    const firstItem = Object.keys(errors)[0]
                    const firstItemDOM = document.getElementById(firstItem)
                    const firstErrorMessage = errors[firstItem][0]

                    console.log(firstErrorMessage);

                    clearErrors()
                    // show the error message
                    firstItemDOM.insertAdjacentHTML('afterend', `<span class="invalid-feedback" role="alert">${firstErrorMessage}</span>`)

                    // highlight the form control with the error
                    firstItemDOM.classList.add('border', 'border-danger','is-invalid')
                }
            });
        });

        function clearErrors() {
            // remove all error messages
            const errorMessages = document.querySelectorAll('.text-danger')
            errorMessages.forEach((element) => element.textContent = '')
            // remove all form controls with highlighted error text box
            const formControls = document.querySelectorAll('.form-control')
            formControls.forEach((element) => element.classList.remove('border', 'border-danger', 'is-invalid'))
        }

        $("#files").fileinput({
            uploadUrl: "/upload",
            uploadExtraData: function(){
                // for access control / security
                return {
                    _token: "{{ csrf_token() }}",
                    id : $('.indikator_id').val(),
                    nama_indikator : $('.indikator_nama').val(),
                }
            },
            theme: 'fas',
            language: 'id',
            showCancel: true,
            allowedFileExtensions: ["jpg", "gif", "png", "txt", "pdf", "xls", "ppt", "doc", "zip"],
            uploadAsync: true,
            previewFileIcon: '<i class="fas fa-file"></i>',
            preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
            previewFileIconSettings: { // configure your icon file extensions
                'doc': '<i class="fas fa-file-word text-primary"></i>',
                'xls': '<i class="fas fa-file-excel text-success"></i>',
                'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
                'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
                'zip': '<i class="fas fa-file-archive text-muted"></i>',
                'htm': '<i class="fas fa-file-code text-info"></i>',
                'txt': '<i class="fas fa-file-text text-info"></i>',
                'mov': '<i class="fas fa-file-movie-o text-warning"></i>',
                'mp3': '<i class="fas fa-file-audio text-warning"></i>',
                // note for these file types below no extension determination logic
                // has been configured (the keys itself will be used as extensions)
                'jpg': '<i class="fas fa-file-image text-danger"></i>',
                'gif': '<i class="fas fa-file-image text-warning"></i>',
                'png': '<i class="fas fa-file-image text-primary"></i>'
            },
            previewFileExtSettings: { // configure the logic for determining icon file extensions
                'doc': function(ext) {
                    return ext.match(/(doc|docx)$/i);
                },
                'xls': function(ext) {
                    return ext.match(/(xls|xlsx)$/i);
                },
                'ppt': function(ext) {
                    return ext.match(/(ppt|pptx)$/i);
                },
                'zip': function(ext) {
                    return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                },
                'htm': function(ext) {
                    return ext.match(/(htm|html)$/i);
                },
                'txt': function(ext) {
                    return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
                },
                'mov': function(ext) {
                    return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                },
                'mp3': function(ext) {
                    return ext.match(/(mp3|wav)$/i);
                },
            }
        }).on('fileuploaded', function(e, params, data, id, index) {
            iziToast.success({
                    icon: 'far fa-check-circle',
                    title: 'Success',
                    message: params.filescount+' Berkas berhasil diupload',
                });
                location.reload();
        });

        function deleteFile(id){
            console.log(id)
            Swal.fire({
                title: 'Anda Yakin Hapus?',
                text: "File yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/delete-file/${id}`,
                        method:'delete',
                        datatype:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){
                            console.log('Berhasil dihapus');
                            Swal.fire(
                                'Berhasil dihapus!',
                                'File berhasil dihapus',
                                'success'
                            )
                            location.reload();
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }
            });
        }
    </script>
@endpush
