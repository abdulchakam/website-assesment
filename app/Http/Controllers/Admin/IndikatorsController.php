<?php

namespace App\Http\Controllers\Admin;

use App\{Aspek,Domain,Indikator,User};

use App\Http\Controllers\Controller;
use App\Http\Requests\IndikatorRequest;
use Illuminate\Http\Request;

class IndikatorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $indikators = Indikator::all();
        return view('admin.indikator.index', ['indikators' => $indikators]);
    }


    public function create()
    {
        $domains = Domain::get();
        $users = User::whereIn('role',['user'])->get();
        $aspeks = Aspek::get();
        $nama_indikators = Indikator::all();
        return view('admin.indikator.create',['domains' => $domains, 'aspeks' => $aspeks,'users' => $users]);
    }

    public function store(IndikatorRequest $request)
    {
        $validateData = $request->all();

        $indikator = Indikator::create($validateData);

        $indikator->users()->attach(request('users'));
        return redirect()->route('indikators.index')->with('pesan','{$validateData}')->with('pesan',"{$validateData['nama_indikator']} Berhasil ditambahkan!");
    }


    public function show(Indikator $indikator)
    {
        return view('admin.indikator.show',compact('indikator'));
    }

    public function edit(Indikator $indikator)
    {

        $domains = Domain::get();
        $users = User::whereIn('role',['user'])->get();
        $aspeks = Aspek::get();
        return view('admin.indikator.edit',[
            'indikator'=> $indikator,
            'domains' => $domains,
            'aspeks' => $aspeks,
            'users' => $users]);
    }

    public function update(Request $request, Indikator $indikator)
    {
        $validateData = $request->validate([
            'nama_indikator_edit' => 'unique:indikators,nama_indikator,'.$indikator->id,
            'ket_indikator'        => 'required',
            'pertanyaan'           => 'required',
            'domain_id'            => 'required',
            'aspek_id'             => 'required',
            'level0'               => 'required',
            'level1'               => 'required',
            'level2'               => 'required',
            'level3'               => 'required',
            'level4'               => 'required',
            'level5'               => 'required',
            'petunjuk'             => 'required',
            'users'                => 'array|required',
        ]);

        $indikator->update($validateData);

        $indikator->users()->sync(request('users'));
        return redirect()->route('indikators.index');
    }

    public function destroy(Indikator $indikator)
    {
        $indikator->users()->detach();
        $indikator->delete();
    }

    public function add_nama_indikator()
    {
        # code...
    }
}
