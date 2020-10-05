<?php

namespace App\Http\Controllers\Admin;

use App\Aspek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AspekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_aspek'    => 'required|min:5|unique:aspeks',
            'ket_aspek'     => 'required|min:8',
        ]);

        Aspek::create($validateData);
        return response()->json($request);
    }

    public function show($id)
    {
        //
    }

    public function edit(Aspek $aspek)
    {
        return response($aspek);
    }

    public function update(Request $request, $id)
    {
        Aspek::where('id',$id)->update([
            'nama_aspek'   => $request->nama_aspek,
            'ket_aspek'    => $request->ket_aspek,
        ]);
    }

    public function destroy(Aspek $aspek)
    {
        $aspek->delete();
    }

    public function findKet(Request $request)
    {
        $aspek = Aspek::select('ket_aspek')->where('id',$request->id)->first();
        return response()->json($aspek);
    }
}
