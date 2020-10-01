<?php

namespace App\Http\Controllers;

use App\{Aspek, Domain, Indikator,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = Auth::user();
        $user_id = $user->id;
        $aspek = Aspek::get();
        $domain = Domain::get();

        $user = User::find($user_id);
        $indikators= $user->indikators()->orderBy('nama_indikator', 'asc')->paginate(1);

        return view('home',['indikators' => $indikators,'aspek' => $aspek, 'domain' => $domain]);
    }

}
