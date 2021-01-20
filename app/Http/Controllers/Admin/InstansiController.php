<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        return view('admin.instansi.index');
    }
}
