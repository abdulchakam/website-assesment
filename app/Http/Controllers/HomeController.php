<?php

namespace App\Http\Controllers;

use App\{FilePendukung, Indikator, Rekap, User};
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $user = User::find($user_id);
        $user_data = User::where('id',[$user_id])->get();
        $data_rekaps = Rekap::where('user_id', [$user_id])->get();
        $data_files = FilePendukung::where('user_id', [$user_id])->get();

        $indikators= $user->indikators()->orderBy('nama_indikator', 'asc')->get();


        return view('home',[
                                        'indikators'=> $indikators,
                                        'user'      => $user_data,
                                        'rekaps'    => $data_rekaps,
                                        'files'     => $data_files
                                        ]);
    }

    public function showIndikator($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $data_indikator = Indikator::where('id', [$id])->first();
        $data_rekap = Rekap::where('indikator_id', [$id])->get();
        $data_files = FilePendukung::where('indikator_id', [$id])->get();

        return view('show',['indikators' => [$data_indikator], 'rekap' => $data_rekap,  'files' => $data_files]);
    }

    public function show(User $user)
    {
        return view('show-user',['user' => $user]);
    }

    public function userUpdate(Request $request,  User $user)
    {
        $validateData = $request->validate([
            'name'                   => 'required|min:3|max:80',
            'username'               => 'required|min:2|max:20|unique:users,username,'.$user->id,
            'email'                  => '',
            'nip'                    => 'required|unique:users,nip,'.$user->id,
            'unit_kerja'             => '',
            'jabatan'                => '',
            'no_hp'                  => '',
            'avatar'                 => 'image|mimes:jpeg, jpg, png, svg|max:2048',
            'instansi'               => '',
            'instansi_induk'         => '',
            'alm_instansi'           => '',
            'telp_instansi'          => '',
            'role'                   => '']);


            $user->update($validateData);
            return response()->json($validateData);
    }

    public function avatarUpdate(Request $request, $id)
    {
        $user = User::find($id);
        File::delete('img/avatar/'.$user->avatar);

        $request->validate([
            'avatar' => 'max:2048',
        ]);

        $avatarFile = request()->file('avatar');

        $avatarName = $request->avatar->getClientOriginalName();
        $avatar = $avatarFile->move(public_path().'/img/avatar/',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back();
        // if ($user->save() == 'true') {
        //     notify()->success("Success notification test","Success","topRight");
        // }else{
        //     notify()->error("Error notification test","Error","topLeft");
        // }

    }


    public function passwordUpdate(PasswordRequest $request)
    {

        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        Auth::logout();
    }
}
