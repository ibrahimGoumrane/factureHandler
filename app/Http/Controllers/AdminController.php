<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'cellule'])->get();
        $roles = \App\Models\Role::all();
        $cellules = \App\Models\Cellule::all();

        return view('admin.index' ,[
            'users' => $users,
            'roles' => $roles,
            'cellules' => $cellules,
        ]);
    }
    public function cellule()
    {
        $cellules = \App\Models\Cellule::all();
        return view('admin.index', [
            'cellules' => $cellules,
        ]);
    }
    public function role()
    {
        $roles = \App\Models\Role::all();
        return view('admin.index', [
            'roles' => $roles,
        ]);
    }
}
