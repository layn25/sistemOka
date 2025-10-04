<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('pages.profile.index');
    }
    public function edit(Request $request, $id)
    {
        try {
            $data = User::findOrFail($id);
            
            $request->validate([
                'nama' => 'required|string|max:255',
                'telepon' => 'nullable|string|max:16',
                'old_password' => 'nullable|string',
                'new_password' => 'nullable|string|min:8|max:12',
            ]);
            
            $data->nama = $request->nama;
            $data->telepon = $request->telepon;

            // Jika user isi password baru, pastikan password lama cocok
            if ($request->filled('new_password')) {
                if (!Hash::check($request->old_password, $data->password)) {
                    return back()->withErrors(['old_password' => 'Password lama tidak cocok.']);
                }
                $data->password = Hash::make($request->new_password);
            }

            $data->save();

            return back()->with('success', 'Profil berhasil diperbarui!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage())->withInput();
        }
    }
        
}
