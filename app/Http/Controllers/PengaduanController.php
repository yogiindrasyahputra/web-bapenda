<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::latest()->paginate(15);
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate(['status' => 'required|in:terbuka,proses,selesai']);
        $pengaduan->update(['status' => $request->status]);
        return back()->with('success', 'Status pengaduan diperbarui.');
    }
}
