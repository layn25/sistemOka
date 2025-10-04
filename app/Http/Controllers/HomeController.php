<?php

namespace App\Http\Controllers;

use App\Models\ApprovalPetugas;
use App\Models\Izin;
use App\Models\Penugasan;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penugasan = Penugasan::count();
        $approval = ApprovalPetugas::where('kondisi', 'proses')->count();
        $izin = Izin::where('status', 'proses')->count();

        return view('pages.index', compact('penugasan', 'approval', 'izin'));
    }

}
