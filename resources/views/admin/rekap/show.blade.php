@extends('admin.index')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-custom">
                @forelse ($indikators as $indikator)
                    <div class="card-header">
                        <div class="d-flex bd-highlight">
                            <div class="mr-auto p-2 bd-highlight">
                                <a href="{{ url('/rekaps') }}"><i class="fas fa-chevron-left mr-2"></i> Kembali</a>
                            </div>

                                @if (!empty($rekap))
                                    @if (count($rekap))
                                        <div class="p-2 bd-highlight">
                                            @if (empty($files))
                                                <button type="button" class="btn btn-sm px-4 bg-cyan text-white" data-toggle="modal" data-target="#modal-files">
                                                    <i class="fas fa-file mr-2"></i>
                                                    Berkas
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm radius-10 px-4 bg-cyan text-white" data-toggle="modal" data-target="#modal-files">
                                                    <i class="fas fa-file mr-2"></i>
                                                    {{ count($files) }} Berkas
                                                </button>
                                            @endif
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <a href="/export-excel/{{ $indikator->id }}" class="btn btn-success btn-sm radius-10 px-4">
                                                <i class="fas fa-file-excel mr-2"></i>
                                                Cetak
                                            </a>
                                        </div>
                                    @endif
                                @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="form-submit-update" enctype="multipart/form-data">
                        @csrf
                            <div class="text-left">

                                <input type="hidden" value="{{ $indikator->id }}" name="indikator_id" class="indikator_id">
                                <input type="hidden" value="{{ $indikator->nama_indikator }}" name="indikator_nama" class="indikator_nama">
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
                                                <input type="radio" id="radiolevel0" name="level" value="level0" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level0') ?? $item->pilihan) == 'level0' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <input type="radio" id="radiolevel1" name="level" value="level1" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level1') ?? $item->pilihan) == 'level1' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <input type="radio" id="radiolevel2" name="level" value="level2" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level2') ?? $item->pilihan) == 'level2' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <input type="radio" id="radiolevel3" name="level" value="level3" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level3') ?? $item->pilihan) == 'level3' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <input type="radio" id="radiolevel4" name="level" value="level4" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level4') ?? $item->pilihan) == 'level4' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <input type="radio" id="radiolevel5" name="level" value="level5" disabled
                                                @if (!empty($rekap))
                                                    @if (count($rekap))
                                                        @foreach ($rekap as $item)
                                                            {{ (old('level5') ?? $item->pilihan) == 'level5' ? 'checked': '' }}
                                                        @endforeach
                                                    @endif
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
                                                <textarea id="penjelasan" class="form-control ckeditor" type="text" name="penjelasan" rows="3" readonly>@if (!empty($rekap))@foreach ($rekap as $item) {{ $item->penjelasan }}@endforeach @endif</textarea>
                                                @error('penjelasan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark-2">
                <h5 class="modal-title font-weight-bolder" id="my-modal-title">File Pendukung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="far fa-times-circle text-danger2"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                @if (!empty($files))
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
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @empty
                        <h5 class="text-muted">Anda Belum Mengupload Berkas</h5>
                    @endforelse
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary radius-10 px-4" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Akhir Modal Files --}}
@endsection


@push('script')

<script>
    $(function(){
    // Enables popover
        $("[data-toggle=popover]").popover();
    });
</script>

@endpush
