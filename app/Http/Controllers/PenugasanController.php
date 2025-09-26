<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Penugasan;
use App\Models\PenugasanAset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class PenugasanController extends Controller
{
    public function index()
    {
        $penugasan = Penugasan::all();
        $users = User::all();
        return view('admin.penugasan.index', compact('penugasan', 'users'));
    }
    
    public function create()
    {
        $users = User::all();
        $asets = Aset::all();
        return view('admin.penugasan.create', compact('users', 'asets'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id', 
                'nama_tugas' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'aset' => 'required|array',
                'aset.*' => 'exists:asets,id',
            ]);

            $data = new Penugasan();
            $data->user_id = $request->user_id;  
            $data->nama_tugas = $request->nama_tugas;
            $data->deskripsi = $request->deskripsi;
            $data->status = '0'; 
            $data->tanggal_mulai = Carbon::parse($request->tanggal_mulai)->format('Y-m-d H:i:s');
            $data->tanggal_selesai = Carbon::parse($request->tanggal_selesai)->format('Y-m-d H:i:s');
            $data->save();
            if ($request->has('aset')) {
                foreach ($request->aset as $asetId) {
                    PenugasanAset::create([
                        'penugasan_id' => $data->id,
                        'aset_id' => $asetId,
                        'tanggal' => Carbon::now(),
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Penugasan berhasil ditambahkan!');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function detail($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $users = User::all();
        return view('admin.penugasan.detail', compact('penugasan', 'users'));
    }
    public function update($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $users = User::all();
        $asets = Aset::all();

        return view('admin.penugasan.edit', compact('penugasan', 'users', 'asets'));
    }

}
