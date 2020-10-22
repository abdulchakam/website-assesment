<?php

namespace App\Http\Controllers;

use App\FilePendukung;
use App\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RekapController extends Controller
{
    public function index()
    {
        return view('admin.rekap.index');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $validateData = $request->validate([
            'level'       => 'required',
            'penjelasan' => 'required',
        ]);

        if($validateData['level'] == 'level0'){
            $nilai = 0;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
            ]);
            return response()->json($data);
        }elseif($validateData['level'] == 'level1'){
            $nilai = 1;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
            ]);
            return response()->json($data);
        }elseif($validateData['level'] == 'level2'){
            $nilai = 2;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }elseif($validateData['level'] == 'level3'){
            $nilai = 3;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }elseif($validateData['level'] == 'level4'){
            $nilai = 4;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
            ]);

            return response()->json($data);
        }else{
            $nilai = 5;
            $data = Rekap::updateOrCreate(['id' => $id],
            [
                'indikator_id' => $request['indikator_id'],
                'pilihan' => $validateData['level'],
                'nilai' => $nilai,
                'penjelasan' => $validateData['penjelasan'],
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
    public function show(Rekap $rekap)
    {
        //
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
}
