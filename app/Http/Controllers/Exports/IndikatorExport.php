<?php

namespace App\Http\Controllers\Exports;

use App\FilePendukung;
use App\Indikator;
use App\Rekap;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IndikatorExport implements FromView
{
    protected $id;

    public function __construct($id) {
            $this->id = $id;
    }
    public function view(): View
    {
        $data_indikator = Indikator::where('id', [$this->id])->first();
        $data_rekap = Rekap::where('indikator_id', [$this->id])->get();
        $data_files = FilePendukung::where('indikator_id', [$this->id])->get();

        return view('admin.export.indikator',['indikators' => [$data_indikator], 'rekap' => $data_rekap,  'files' => $data_files]);;
    }
}
