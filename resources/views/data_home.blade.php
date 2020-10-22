
<div class="card">

    <div class="card-body">
        <form action="" method="post" id="form-submit-update" enctype="multipart/form-data">
        @csrf
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="text-left">
            @forelse ($indikators as $indikator)

            <input type="hidden" value="{{ $indikator->id }}" name="indikator_id" class="indikator_id">
            <input type="hidden" value="{{ $indikator->nama_indikator }}" name="indikator_nama" class="indikator_nama">
            <input type="hidden" value="{{ $indikator->rekap['id'] }}" name="id">
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
                                {{(old('level') ?? $indikator->rekap['pilihan']) == 'level0' ? 'checked' : ''}}>
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
                            {{(old('level') ?? $indikator->rekap['pilihan']) == 'level1' ? 'checked' : ''}}>
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
                            {{(old('level') ?? $indikator->rekap['pilihan']) == 'level2' ? 'checked' : ''}}>
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
                            {{(old('level') ?? $indikator->rekap['pilihan']) == 'level3' ? 'checked' : ''}}>
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
                            {{(old('level') ?? $indikator->rekap['pilihan']) == 'level4' ? 'checked' : ''}}>
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
                            {{(old('level') ?? $indikator->rekap['pilihan']) == 'level5' ? 'checked' : ''}}>
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
                            <textarea id="penjelasan" class="form-control" type="text" name="penjelasan" rows="3">{{ old('penjelasan') ?? $indikator->rekap['penjelasan'] }}</textarea>
                            @error('penjelasan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <div class="">
                                    <label for="penjelasan" class="font-weight-bold">Berkas Pendukung</label>
                                    <button type="button" class="btn btn-info btn-sm px-4 text-white ml-3" data-toggle="modal" data-target="#modal-files">
                                        <i class="fas fa-file mr-2"></i>
                                        {{ $indikator->files()->count() }} Berkas
                                    </button>
                                </div>
                                <span class="text-danger">
                                    Jika form upload tidak tampil silahkan refresh halaman
                                </span>
                                <div class="file-loading">
                                    <input id="files" name="files[]" multiple type="file">
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-md-12 d-flex justify-content-end">
            @if (!$indikator->rekap['pilihan'])
                <button type="button" class="btn btn-success btn-rounded px-5 btn-submit-update">Submit</button>
            @else
                <button type="button" class="btn btn-primary btn-rounded px-5 btn-submit-update">Update</button>
            @endif
        </div>
    </div>
                @empty
                <h3 class="text-center">Tidak ada indikator...</h3>
            @endforelse
        </form>
</div>
<div class="d-flex justify-content-center mt-3">
    {{ $indikators->links() }}
</div>

{{-- Modal Files --}}
<div id="modal-files" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">File Pendukung</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @forelse ($indikator->files as $file)
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
                    Belum ada file yang di upload
                @endforelse
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(function () {
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
            const  form_data = $('#form-submit-update').serialize();
            console.log(form_data);

            $.ajax({
                data: form_data,
                url: `/rekaps`,
                method: 'POST',
                success: function(data){
                    console.log('berhasil');
                    iziToast.success({
                        icon: 'far fa-check-circle',
                        title: 'Success',
                        message: 'Perubahan Berhasil disimpan',
                    });

                    location.reload();
                },
                error: function(error){
                    console.log(error);
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
            allowedFileExtensions: ["jpg", "gif", "png", "txt", "pdf"],
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
