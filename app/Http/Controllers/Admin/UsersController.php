<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin|super admin');
    }
    public function index(Request $request)
    {
        $users = User::whereIn('role',['admin','super admin'])->get();

        if($request->ajax()){
            return datatables()->of($users)
                    ->editColumn('created_at', function(User $user){
                        return $user->created_at->format('d, M Y');
                    })->addcolumn('aksi', function($data){
                        $button = '<div class="text-center">';
                        $button .= '<button data-id="'.$data->id.'" class=" btn btn-sm shadow-sm bg-white radius-10 detail btn-action-primary"><i class="fas fa-chevron-right fa-lg"></i></button>';
                        // $button .= '<button type="button" name="delete" data-nama="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-sm shadow-sm bg-white rounded"><i class="far fa-trash-alt text-danger"></i></button>';
                        $button .= '</div>';
                        return $button;
                    })->rawColumns(['aksi'])->make(true);
        }

        return view('admin.users.user_admin.index');
    }

    public function usersDinas(Request $request)
    {

        $users = User::whereIn('role',['user'])->get();

        if($request->ajax()){
            return datatables()->of($users)
                    ->editColumn('created_at', function(User $user){
                        return $user->created_at->format('d, M Y');
                    })->addcolumn('aksi', function($data){
                        $button = '<div class="text-center">';
                        $button .= '<button data-id="'.$data->id.'" class=" btn btn-sm shadow-sm bg-white radius-10 detail btn-action-primary"><i class="fas fa-chevron-right fa-lg"></i></button>';
                        // $button .= '<button type="button" name="delete" data-nama="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-sm shadow-sm bg-white rounded"><i class="far fa-trash-alt text-danger"></i></button>';
                        $button .= '</div>';
                        return $button;
                    })->rawColumns(['aksi'])->make(true);
        }

        return view('admin.users.user_dinas.index');
    }

    public function showInstansi(Request $request)
    {
        $users = User::whereIn('role',['user'])->distinct()->get(['instansi','instansi_induk','alm_instansi']);

        if($request->ajax()){
            return datatables()->of($users)
                    ->make(true);
        }

        return view('admin.instansi.index');
    }

    public function create()
    {

    }

    public function store(UserRequest $request)
    {
        $validateData = $request->validated();
        $user = User::create([
            'nip'           =>  $validateData['nip'],
            'name'          =>  $validateData['name'],
            'username'      =>  $validateData['username'],
            'email'         =>  $validateData['email'],
            'role'          =>  $validateData['role'],
            'unit_kerja'    =>  $validateData['unit_kerja'],
            'jabatan'       =>  $validateData['jabatan'],
            'no_hp'         =>  $validateData['no_hp'],
            'instansi'      =>  $validateData['instansi'],
            'instansi_induk'=>  $validateData['instansi_induk'],
            'alm_instansi'  =>  $validateData['alm_instansi'],
            'telp_instansi' =>  $validateData['telp_instansi'],
            'password'      =>  Hash::make($validateData['password'])
        ]);


        if($validateData['role']=='admin'){
            $user->assignRole('admin');
            return response()->json($user);

        }elseif($validateData['role']=='super admin'){
            $user->assignRole('super admin');
            return response()->json($user);

        }else{
            $user->assignRole('user');
            return response()->json($user);
        }

    }

    public function show(User $user)
    {
        return view('admin.users.show',['user' => $user]);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $user  = User::where($where)->first();

        return response()->json($user);
    }


    public function update(Request $request,  User $user)
    {
        $validateData = $request->validate([
            'name'                   => 'required|min:3|max:80',
            'username'               => 'required|min:2|max:20|unique:users,username,'.$user->id,
            'email'                  => '',
            'nip'                    => 'required|unique:users,nip,'.$user->id,
            'unit_kerja'             => '',
            'jabatan'                => '',
            'no_hp'                  => '',
            'instansi'               => '',
            'instansi_induk'         => '',
            'alm_instansi'           => '',
            'telp_instansi'          => '',
            'role'                   => 'required',
        ]);

        if($validateData['role']=='admin'){
            $user->syncRoles('admin');
            $user->update($validateData);
            return response()->json($validateData);


        }elseif($validateData['role']=='super admin'){
            $user->syncRoles('super admin');
            $user->update($validateData);
            return response()->json($validateData);


        }else{
            $user->syncRoles('user');
            $user->update($validateData);
            return response()->json($validateData);

        }
    }

    public function destroy(User $user)
    {
        $user->Indikators()->detach();
        $user->delete();
    }

    public function infoUser(User $user)
    {
        return view('admin/users/info',['user' => $user]);
    }
}
