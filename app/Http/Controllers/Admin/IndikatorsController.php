<?php

namespace App\Http\Controllers\Admin;

use App\{Aspek,Domain,Indikator,User};

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exports\IndikatorExport;
use App\Http\Requests\IndikatorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class IndikatorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin|super admin');
    }
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $indikators = Indikator::with('users')->select('indikators.*');

            return datatables()->of($indikators)
                        ->editColumn('ket_indikator', function(Indikator $indikator){
                            return Str::limit($indikator->ket_indikator, 45, ' ...');
                        })
                        ->addColumn('users', function (Indikator $indikator) {
                            return $indikator->users->pluck('username')->implode('  |  ');})
                        ->addColumn('aksi', function ($data)
                        {
                            $button = '<div class="text-center">';
                            $button .= '<button data-id="'.$data->id.'" class="edit radius-10 btn  shadow-sm bg-white btn-action-primary btn-detail"><i class="fas fa-chevron-right"></i></button>';
                            $button .= '</div>';
                            return $button;
                        })->rawColumns(['aksi'])->make(true);
        }
        // $indikators = Indikator::all();
        return view('admin.indikator.index');
    }


    public function create()
    {
        $domains = Domain::get();
        $users = User::whereIn('role',['user'])->distinct('instansi')->get();
        $aspeks = Aspek::get();
        return view('admin.indikator.create',['domains' => $domains, 'aspeks' => $aspeks,'users' => $users]);
    }

    public function store(IndikatorRequest $request)
    {
        $validateData = $request->all();

        $indikator = Indikator::create($validateData);

        $indikator->users()->attach(request('users'));
        return response()->json($indikator);
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
            'nama_indikator'       => 'unique:indikators,nama_indikator,'.$indikator->id,
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
}
