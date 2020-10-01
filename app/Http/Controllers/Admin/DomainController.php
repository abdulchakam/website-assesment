<?php

namespace App\Http\Controllers\Admin;

use App\Domain;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DomainController extends Controller
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
            'nama_domain'       => 'required|min:8|unique:domains',
            'ket_domain' => 'required|min:10',
        ]);

        Domain::create($validateData);
    }


    public function show($id)
    {
        //
    }


    public function edit(Domain $domain)
    {
        return response($domain);

    }


    public function update(Request $request, $id)
    {
        Domain::where('id',$id)->update([
            'nama_domain'   => $request->nama_domain,
            'ket_domain'    => $request->ket_domain,
        ]);
    }

    public function destroy(Domain $domain)
    {
        $domain->delete();
    }

    public function findKet(Request $request)
    {
        $domain = Domain::select('ket_domain')->where('id',$request->id)->first();
        return response()->json($domain);
    }
}