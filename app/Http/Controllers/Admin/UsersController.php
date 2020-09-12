<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
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
        return view('admin.users.create');
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
            $user->assignRole('admin');
            return redirect()->route('users.index')
                    ->with('pesan',"User {$validateData['name']} Berhasil ditambahkan!" );

        }elseif($validateData['role']=='super admin'){
            $user->assignRole('super admin');
            return redirect()->route('users.index')
                    ->with('pesan',"User {$validateData['name']} Berhasil ditambahkan!" );

        }else{
            $user->assignRole('user');
            return redirect()->route('users-dinas')
                    ->with('pesan',"User {$validateData['name']} Berhasil ditambahkan!" );
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
            $user->update($validateData);
            return redirect()->back()
                        ->with('pesan',"User {$validateData['name']} Berhasil diUpdate!" );

        }elseif($validateData['role']=='super admin'){
            $user->syncRoles('super admin');
            $user->update($validateData);
            return redirect()->back()
                        ->with('pesan',"User {$validateData['name']} Berhasil diUpdate!" );

        }else{
            $user->syncRoles('user');
            $user->update($validateData);
            return redirect()->back()
                        ->with('pesan',"User {$validateData['name']} Berhasil diUpdate!" );
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        if ($user['role'] == 'user') {
            return redirect()->route('users-dinas')
            ->with('pesan',"User $user->name berhasil dihapus");
        } else {
            return redirect()->route('users.index')
            ->with('pesan',"User $user->name berhasil dihapus");
        }
    }

}
