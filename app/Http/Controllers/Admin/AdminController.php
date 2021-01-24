<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain;
use App\FilePendukung;
use App\Http\Controllers\Exports\IndeksExport;
use App\Indikator;
use App\Rekap;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $indikators = Indikator::all();
        $rekaps = Rekap::all();
        $files = FilePendukung::all();
        $user_dinas = User::whereIn('role',['user'])->get();
        $indeks_domain = Rekap::get();
        $domains = Domain::all();

        return view('admin.dashboard', [
                                        'indikators'        => $indikators,
                                        'rekaps'            => $rekaps,
                                        'files'             => $files,
                                        'users'             => $user_dinas,
                                        'domains'           => $domains,
                                        'indeks_domain'     => $indeks_domain
                                        ]);
    }

    public function indeksChart($id)
    {
        $domains = Domain::get();
        $indeks_domain = Rekap::where('domain_id', $id)->groupBy('domain_id')->get();

        $data = [];

        foreach ($indeks_domain as $indeks) {

            foreach ($domains as $domain) {
                $data['label'] [] = Str::before($domain->ket_domain, 'SPBE');
                $data['nilai'] [] = round($indeks->where('domain_id', $domain->id)->avg('nilai'), 2);
                $data['colours'][] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);

            }
        }

        $data['chart_data'] = json_encode($data);
        return $data;
    }
    public function aspekChart($id)
    {
        $group_aspek = Rekap::where('domain_id', $id)->groupBy('aspek_id')->get();

        $data = [];

        foreach ($group_aspek as $aspek) {
            $data['label'][] = Str::after($aspek->aspek->ket_aspek, 'Kebijakan Internal');
            $data['nilai'][] = round(Rekap::where('aspek_id', $aspek->aspek_id)->avg('nilai'),2);
            $data['colours'][] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $data['chart_data'] = json_encode($data);
        return $data;
    }


    public function domainChart($id)
    {
        $indeks_domain = Rekap::where('domain_id', $id)->get();

        $data = [];

        foreach ($indeks_domain as $indek_domain) {
            $label =Str::after($indek_domain->indikator->ket_indikator, 'Kebijakan Internal');
            $data['label'][] =  Str::words($label, '2');
            $data['nilai'][] = $indek_domain->nilai;
            $data['colours'][] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $data['chart_data'] = json_encode($data);
        return $data;
    }

    public function exportExcel()
    {
        return Excel::download(new  IndeksExport, 'Indeks SPBE.xlsx');
    }

    public function exportPDF()
    {
        $indikators = Indikator::all();
        $rekaps = Rekap::all();
        $files = FilePendukung::all();
        $user_dinas = User::whereIn('role',['user'])->get();
        $indeks_domain = Rekap::get();
        $domains = Domain::all();

        $pdf = PDF::loadview('admin.export.indeks-spbe-pdf', [
            'indikators'        => $indikators,
            'rekaps'            => $rekaps,
            'files'             => $files,
            'users'             => $user_dinas,
            'domains'           => $domains,
            'indeks_domain'     => $indeks_domain
            ])->setPaper('A4', 'portrait');

        return $pdf->stream();
    }
}
