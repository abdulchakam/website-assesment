@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <form action="" method="post">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-left">
                        @forelse ($indikators as $indikator)
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="w-25 font-weight-bold">{{ $indikator->nama_indikator }}</td>
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
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="w-15 font-weight-bold">Level 0</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level0 }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-25 font-weight-bold">Level 1</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level1 }}</td>
                                            </tr><tr>
                                                <td class="w-25 font-weight-bold">Level 2</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level2 }}</td>
                                            </tr><tr>
                                                <td class="w-25 font-weight-bold">Level 3</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level3 }}</td>
                                            </tr><tr>
                                                <td class="w-25 font-weight-bold">Level 4</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level4 }}</td>
                                            </tr><tr>
                                                <td class="w-25 font-weight-bold">Level 5</td>
                                                <td> : </td>
                                                <td>{{ $indikator->level5 }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="penjelasan">Penjelasan</label>
                                        <textarea id="penjelasan" class="form-control" type="text" name="penjelasan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info">File Pendukung</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success btn-rounded px-4">Submit</button>
                        </div>
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
        </div>
    </div>
</div>
@endsection
