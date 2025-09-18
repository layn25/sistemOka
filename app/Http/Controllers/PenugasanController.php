<?php

namespace App\Http\Controllers;

class PenugasanController extends Controller
{
    public function index()
    {
        return view('admin.penugasan.index');
    }

    public function show()
    {
        return view('admin.penugasan.show');
    }

    public function create()
    {
        return view('admin.penugasan.create');
    }
}
