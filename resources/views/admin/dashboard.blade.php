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
            <div class="d-flex justify-content-between mb-4">
                <h4 class="card-title text-dark">Indeks Domain</h4>
                <div class="">
                    <a href="{{ url('/export-indeks-pdf/') }}" target="_blank" class="btn btn-danger radius-10 btn-sm px-4">
                        <i class="fas fa-file-pdf mr-2"></i>
                        PDF
                    </a>
                    <a href="{{ url('/export-indeks-excel/') }}" target="_blank" class="btn btn-success radius-10 btn-sm px-4">
                        <i class="fas fa-file-excel mr-2"></i>
                        Excel
                    </a>
                </div>
            </div>
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
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="card card-custom shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">Chart</h5>
                                    <canvas id="indeksChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                @foreach ($domains as $domain)

                <div class="tab-pane fade" id="nav-{{ $domain->id }}" role="tabpanel" aria-labelledby="nav-{{ $domain->id }}-tab">
                    <div class="d-flex justify-content-between my-4">
                        <h5 class="font-weight-bold">Indeks {{ $domain->ket_domain }}</h5>
                        {{-- <button type="button" class="btn btn-success radius-10" data-toggle="modal" data-target="#modalChart">Chart</button> --}}
                    </div>
                    <div class="container">
                        <div class="row my-2">
                            <div class="col-md-6">
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
                                        @forelse  ($indeks_domain->where('domain_id', $domain->id)->unique('aspek_id') as $indeks)
                                        <tr>
                                            <td>{{ $indeks->aspek->ket_aspek }}</td>
                                            <td>
                                                {{
                                                    round(App\Rekap::where('aspek_id', $indeks->aspek_id)->avg('nilai'), 2)
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
                            <div class="col-md-6">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title">Chart</h5>
                                        <canvas id="aspekChart{{ $domain->id }}"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col-md-6">
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
                            <div class="col-md-6">
                                <div class="card card-custom shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Chart Domain {{ $domain->ket_domain }}</h5>
                                        <canvas id="domainChart{{ $domain->id }}"></canvas>
                                    </div>
                                </div>
                            </div>
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

            $.ajax({
                url: `/domain-chart/${id}`,
                method: "GET",
                success:function(data){
                    var ctx = document.getElementById('domainChart'+id);

                    var dataChart = {
                        labels: data.label,
                        datasets: [{
                            label: 'Indeks Domain',
                            data: data.nilai,
                            pointBackgroundColor: data.colours,
                            backgroundColor: 'rgba(241,248,255,0.8)',
                            borderWidth: 0.5
                        }]
                    }
                    var options = {
                        responsive: true,
                        legend: {
                        display: false,
                        position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 16,
                            }
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                max: 5,
                                min: 0
                            }
                        }
                    };

                    var myRadarChart = new Chart(ctx, {
                        type: 'radar',
                        data: dataChart,
                        options: options
                    });
                },
                error:function(error){

                },
            });

            // Aspek Chart
            $.ajax({
                url: `/aspek-chart/${id}`,
                method: "GET",
                success:function(data){
                    var ctx = document.getElementById('aspekChart'+id);

                    var dataChart = {
                        labels: data.label,
                        datasets: [{
                            label: 'Indeks Domain',
                            data: data.nilai,
                            pointBackgroundColor: data.colours,
                            backgroundColor: 'rgba(241,248,255,0.8)',
                            borderWidth: 0.5
                        }]
                    }
                    var options = {
                        responsive: true,
                        legend: {
                        display: false,
                        position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 16,
                            }
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                max: 5,
                                min: 0
                            }
                        }
                    };

                    var myRadarChart = new Chart(ctx, {
                        type: 'radar',
                        data: dataChart,
                        options: options
                    });
                },
                error:function(error){

                },
            });
        });

                    // Indeks Chart
                    $.ajax({
                url: `/indeks-chart/1`,
                method: "GET",
                success:function(data){
                    var ctx = document.getElementById('indeksChart');

                    var dataChart = {
                        labels: data.label,
                        datasets: [{
                            label: 'Indeks Domain',
                            data: data.nilai,
                            pointBackgroundColor: data.colours,
                            backgroundColor: 'rgba(241,248,255,0.8)',
                            borderWidth: 0.5
                        }]
                    }
                    var options = {
                        responsive: true,
                        legend: {
                        display: false,
                        position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 16,
                            }
                        },
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                max: 5,
                                min: 0
                            }
                        }
                    };

                    var myRadarChart = new Chart(ctx, {
                        type: 'radar',
                        data: dataChart,
                        options: options
                    });
                },
                error:function(error){

                },
            });

    </script>
@endpush
