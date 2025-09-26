<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Throwable;

class AsetController extends Controller
{
    public function index()
    {
        $data = Aset::all();
        return view('admin.aset.index', compact('data'));
    }
    public function create()
    {
        return view('admin.aset.create');
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama'=> 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'kondisi'=> 'required|in:baik,rusakRingan,rusakBerat',
            ]);

            $data = new Aset();
            $data->nama = $request->nama;  
            $data->deskripsi = $request->deskripsi;
            $data->kondisi = $request->kondisi;
            $data->save();

            return redirect()->back()->with('success', 'Aset berhasil ditambahkan!');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage())->withInput();
        }
    }
}
