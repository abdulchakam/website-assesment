@extends('admin.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 p-4">
                <div class="card-custom bg-white shadow-sm p-4">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h2 class="text-dark font-weight-medium">{{ count($indikators) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Indikator</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-question-circle large-icon m-auto text-light"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 p-4">
                <div class="card-custom bg-white shadow-sm p-4">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h2 class="text-dark font-weight-medium">{{ count($rekaps) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Indikator Terisi</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-check-circle large-icon m-auto text-light"></i>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 p-4">
                <div class="card-custom bg-white shadow-sm p-4">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <h2 class="text-dark font-weight-medium">{{ count($users) }}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah User Dinas</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-users large-icon m-auto text-light"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row my-4">
    <div class="col-md-12">
        <div class="card-custom shadow-sm p-4 bg-white">
            <h4 class="card-title text-dark">Indeks Domain</h4>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-indeks-spbe-tab" data-toggle="tab" href="#nav-indeks-spbe" role="tab" aria-controls="nav-indeks-spbe" aria-selected="true">Indeks SPBE</a>
                    @foreach ($domains as $domain)
                        <a class="nav-item nav-link tab-domain" id="nav-{{ $domain->id }}-tab" data-toggle="tab" href="#nav-{{ $domain->id }}" role="tab" aria-controls="nav-{{ $domain->id }}" aria-selected="false" data-domain="{{ $domain->id }}">{{ $domain->ket_domain }}</a>
                    @endforeach
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-indeks-spbe" role="tabpanel" aria-labelledby="nav-indeks-spbe-tab">
                    <h5 class="my-4 font-weight-bold">Indeks SPBE</h5>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th>Indeks SPBE</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Domain</th>
                                        <th>Indeks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($domains as $domain)
                                        <tr>
                                            <td>{{ $domain->ket_domain }}</td>
                                            <td>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">Data Kosong</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                @foreach ($domains as $domain)

                <div class="tab-pane fade" id="nav-{{ $domain->id }}" role="tabpanel" aria-labelledby="nav-{{ $domain->id }}-tab">
                    <h5 class="my-4 font-weight-bold">Indeks {{ $domain->ket_domain }}</h5>
                    <div class="container">
                        <div class="row my-2">
                            <div class="col-md-8">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="bg-info text-white">
                                            <td>Indeks Domain {{ $domain->ket_domain }}</td>
                                            <td>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Aspek</th>
                                            <th>Indeks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse  ($indeks_domain->where('domain_id', $domain->id)->unique('aspek_id') as $d_kebijakan)
                                        <tr>
                                            <td>{{ $d_kebijakan->aspek->ket_aspek }}</td>
                                            <td>
                                                {{
                                                    round(App\Rekap::where('aspek_id', $d_kebijakan->aspek_id)->avg('nilai'), 2)
                                                }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2">Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Chart</h5>

                                    </div>
                                </div>
                            </div> --}}
                        </div>


                        <div class="row my-2">
                            <div class="col-md-8">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr class="bg-info text-white">
                                            <td>Indeks Domain {{ $domain->ket_domain }}</td>
                                            <td>{{ round($indeks_domain->where('domain_id', $domain->id)->avg('nilai'), 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Indikator</th>
                                            <th>Indeks</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($indeks_domain->where('domain_id', $domain->id) as $indeks)
                                        <tr>
                                            <td>{{ Str::after($indeks->indikator->ket_indikator, 'Kebijakan Internal') }}</td>
                                            <td>{{ $indeks->nilai }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2">Data Kosong</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Chart</h5>

                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="tab-pane fade" id="nav-layanan" role="tabpanel" aria-labelledby="nav-layanan-tab">...</div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $('.tab-domain').click(function(){
            const id = $(this).data('domain');
        });
    </script>
@endpush
