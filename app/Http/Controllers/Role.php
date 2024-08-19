<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use App\Models\User;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use function auth;
use function file_exists;
use function ltrim;
use function redirect;
use function response;
use function time;
use function unlink;
use function view;

class Role extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($year = null, $month = null)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);
        \App\Models\Role::create($attrs);
        return redirect()->back()->with('success', 'Role est ajouter avec success');
    }


    /**
     * Display the specified resource.
     */
    public function show(caisse $caisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('view', User::class);

        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $exists = DB::table('roles')->where('libelle', $validatedData['libelle'])->exists();
        if ($exists) {
            throw ValidationException::withMessages([
                'libelle' => 'le libelle doit etre unique',
            ]);
        }

        $role = \App\Models\Role::findOrFail($id);

        $role->update([
            'libelle' => $validatedData['libelle'],
        ]);

        return redirect()->back()->with('success', 'role est modifier avec success');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gate::authorize('view', User::class);
        $role = \App\Models\Role::findOrFail($id);

        $role->delete();

        return redirect()->back()->with('success', 'role est supprimer avec success');

    }
}
