<?php

namespace App\Http\Controllers\Admin;

use App\Domain;
use App\FilePendukung;
use App\Http\Controllers\Controller;
use App\Indikator;
use App\Rekap;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $indikators = Indikator::all();
        $rekaps = Rekap::all();
        $files = FilePendukung::all();
        $user_dinas = User::whereIn('role',['user'])->get();
        $indeks_domain = Rekap::get();
        $domains = Domain::all();

        return view('admin.dashboard', [
                                        'indikators'        => $indikators,
                                        'rekaps'            => $rekaps,
                                        'files'             => $files,
                                        'users'             => $user_dinas,
                                        'domains'           => $domains,
                                        'indeks_domain'     => $indeks_domain
                                        ]);
    }
}
