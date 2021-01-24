<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;
use App\Domain;
use App\FilePendukung;
use App\Indikator;
use App\Rekap;
use App\User;

class IndeksExport implements FromView
{
    public function view(): View
    {
        $indikators = Indikator::all();
        $rekaps = Rekap::all();
        $files = FilePendukung::all();
        $user_dinas = User::whereIn('role',['user'])->get();
        $indeks_domain = Rekap::get();
        $domains = Domain::all();

        return view('admin.export.indeks-spbe-excel', [
            'indikators'        => $indikators,
            'rekaps'            => $rekaps,
            'files'             => $files,
            'users'             => $user_dinas,
            'domains'           => $domains,
            'indeks_domain'     => $indeks_domain
            ]);
    }
}
