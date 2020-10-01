<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Contracts\Role as ContractsRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::whereIn('role',['admin','super admin'])->get();
        return view('admin.users.user_admin.index', ['users' => $users]);
    }

    public function usersDinas()
    {
        $users = User::whereIn('role',['user'])->get();
        return view('admin.users.user_dinas.index', ['users' => $users]);
    }

    public function create()
    {

    }

    public function store(UserRequest $request)
    {
        $validateData = $request->validated();
        $user = User::create([
            'name'      =>  $validateData['name'],
            'username'  =>  $validateData['username'],
            'email'     =>  $validateData['email'],
            'role'      =>  $validateData['role'],
            'password'  =>  Hash::make($validateData['password']),
        ]);


        if($validateData['role']=='admin'){
            $user->givePermissionTo('read only');
            $user->assignRole('admin');
            return redirect()->route('users.index')
                    ->with('toast_success',"User {$validateData['name']} berhasil ditambahkan");

        }elseif($validateData['role']=='super admin'){
            $user->givePermissionTo('full control');
            $user->assignRole('super admin');
            return redirect()->route('users.index')
                    ->with('toast_success',"User {$validateData['name']} berhasil ditambahkan");

        }else{
            $user->assignRole('user');
            return redirect()->route('users-dinas')
                    ->with('toast_success',"User {$validateData['name']} berhasil ditambahkan");
        }

    }


    public function show(User $user)
    {
        return view('admin.users.show',['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }


    public function update(Request $request,  User $user)
    {
        $validateData = $request->validate([
            'name'                   => 'required|min:3|max:80',
            'username'               => 'required|min:2|max:20|unique:users,username,'.$user->id,
            'email'                  => 'required|email',
            'role'                   => 'required',
        ]);

        if($validateData['role']=='admin'){
            $user->syncRoles('admin');
            $user->syncPermissions('read only');
            $user->update($validateData);
            return redirect()->back()
                        ->with('toast_success',"User {$validateData['name']} berhasil diperbarui");

        }elseif($validateData['role']=='super admin'){
            $user->syncRoles('super admin');
            $user->syncPermissions('full control');
            $user->update($validateData);
            return redirect()->back()
                        ->with('toast_success',"User {$validateData['name']} berhasil diperbarui");

        }else{
            $user->syncRoles('user');
            $user->update($validateData);
            return redirect()->back()
                        ->with('toast_success',"User {$validateData['name']} berhasil diperbarui");
        }
    }

    public function destroy(User $user)
    {
        $user->Indikators()->detach();
        $user->delete();
    }

}
