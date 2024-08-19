<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use function dump;

class AdminController extends Controller
{
    public function index()
    {
        Gate::authorize('view', User::class);
        $users = User::with(['role', 'cellule'])->where('is_admin', false)->get();        $roles = \App\Models\Role::all();
        $cellules = \App\Models\Cellule::all();
        return view('admin.index' ,[
            'users' => $users,
            'roles' => $roles,
            'cellules' => $cellules,
        ]);
    }
    public function cellule()
    {
        Gate::authorize('view', User::class);

        $cellules = \App\Models\Cellule::all();
        return view('admin.index', [
            'cellules' => $cellules,
        ]);
    }
    public function role()
    {
        Gate::authorize('view', User::class);
        $roles = \App\Models\Role::all();
        return view('admin.index', [
            'roles' => $roles,
        ]);
    }
}
