<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        return view('struktur-organisasi.index');
    }
}
