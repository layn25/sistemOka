<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show()
    {
        return view('admin.users.show');
    }
}
