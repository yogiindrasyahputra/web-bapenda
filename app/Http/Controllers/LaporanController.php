<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $isJurnalPajak = request()->query('jenis') === 'jurnal-pajak';

        return view('laporan.index', compact('isJurnalPajak'));
    }
}
