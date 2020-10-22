<?php

namespace App\Http\Controllers;

use App\{Aspek, Domain, Indikator, Rekap, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $indikators= $user->indikators()->orderBy('nama_indikator', 'asc')->paginate(1);

        if ($request->ajax()) {
            return view('data_home',['indikators' => $indikators]);
        }
        return view('home',['indikators' => $indikators]);
    }

    public function fileUpload (){

    }

}
