<?php

namespace App\Http\Controllers;

use App\FilePendukung;
use App\Indikator;
use App\Http\Controllers\Exports\IndikatorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class RekapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

        if($request->ajax()){
            $query = Indikator::with('users')->select('indikators.*');

            return datatables()->eloquent($query)
            ->addColumn('users', function(Indikator $indikator){
                return $indikator->users->pluck('username')->implode(' | ');
            })
            ->addColumn('status', function(Indikator $indikator){
                $rekap = Rekap::where('indikator_id',$indikator->id)->get();

                if ($rekap->count() === 0) {
                    $status = '<span class="badge badge-pill badge-danger py-1 px-2">';
                    $status .= '<i class="fas fa-exclamation-circle mr-2"></i> Belum';
                    $status .= '</span>';
                    return $status;
                }else{
                    $status = '<span class="badge badge-pill badge-success py-1 px-2">';
                    $status .= '<i class="fas fa-check-circle mr-2"></i> Terisi';
                    $status .= '</span>';
                    return $status;
                }
            })
            ->addColumn('aksi', function(Indikator $indikator){
                $button = '<button class=" btn btn-sm shadow-sm bg-white radius-10 btn-detail btn-action-primary" type="button" data-id="'.$indikator->id.'">';
                $button .= '<i class="fas fa-chevron-right fa-lg"></i>';
                $button .= '</button>';
                return $button;
            })->rawColumns(['status','aksi'])->make(true);
        }
        return view('admin.rekap.index');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user_id  = $user->id;

        $id = $request->id;
        $validateData = $request->validate([
            'level'       => 'required',
            'penjelasan'  => 'required',
        ]);

        if($validateData['level'] == 'level0'){
            $nilai = 0;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);
            return response()->json($data);
        }elseif($validateData['level'] == 'level1'){
            $nilai = 1;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);
            return response()->json($data);
        }elseif($validateData['level'] == 'level2'){
            $nilai = 2;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }elseif($validateData['level'] == 'level3'){
            $nilai = 3;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }elseif($validateData['level'] == 'level4'){
            $nilai = 4;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }else{
            $nilai = 5;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id'  => $request['indikator_id'],
                'domain_id'     => $request['domain_id'],
                'aspek_id'      => $request['aspek_id'],
                'user_id'       => $user_id,
                'pilihan'       => $validateData['level'],
                'nilai'         => $nilai,
                'penjelasan'    => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }
    }

    public function fileUpload(Request $request)
    {

        $indikator_id = $request->id;
        $nama_indikator = $request->nama_indikator;

        $user = Auth::user();
        $username = $user->username;
        $user_id = $user->id;

        if($request->hasFile('files')){

            foreach ($request->file('files') as $file)
            {
                $name ='FP_'.$username.'('.$nama_indikator.')'.'_'.time().'.'.$file->extension();
                $file->move(public_path().'/files/', $name);
                $data = $name;
            }

            $file= new FilePendukung();
            $file->indikator_id = $indikator_id;
            $file->user_id = $user_id;
            $file->file_name=$data;
            $file->save();

            return response()->json();
        }
    }

    public function downloadFile($file)
    {
        return response()->download(public_path("files/{$file}"));
    }

    public function deleteFile(FilePendukung $file)
    {

        $id = ($file->id);
        $file = FilePendukung::where('id',$id)->first();
		File::delete('files/'.$file->file_name);

        FilePendukung::where('id',$id)->delete();

    }
    public function show($id)
    {

    }

    public function edit(Rekap $rekap)
    {
        //
    }

    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    public function destroy(Rekap $rekap)
    {
        //
    }

    public function detailRekap($id)
    {
        $indikator = Indikator::find($id);

            $data_indikator = Indikator::where('id', [$id])->first();
            $data_rekap = Rekap::where('indikator_id', [$id])->get();
            $data_files = FilePendukung::where('indikator_id', [$id])->get();

            return view('admin.rekap.show',['indikators' => [$data_indikator], 'rekap' => $data_rekap,  'files' => $data_files]);

        // return view('admin.rekap.show',['indikators' =>[$indikator]]);
    }

    public function export(Request $request)
    {
        return Excel::download(new IndikatorExport($request->id), 'Indikator.xlsx');
    }

    public function exportPDF($id)
    {
        $data_indikator = Indikator::where('id', [$id])->first();
        $data_rekap = Rekap::where('indikator_id', [$id])->get();

        $pdf = PDF::loadview('admin.export.indikatorPDF',['indikators' => [$data_indikator], 'rekap' => $data_rekap])->setPaper('A4','landscape');
        return $pdf->stream();

    }
}
