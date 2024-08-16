<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $validatedData = $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $exists = DB::table('roles')->where('libelle', $validatedData['libelle'])->exists();
        if ($exists) {
            throw ValidationException::withMessages([
                'libelle' => 'We can\'t have two roles with the same name',
            ]);
        }

        $role = \App\Models\Role::findOrFail($id);

        $role->update([
            'libelle' => $validatedData['libelle'],
        ]);

        return redirect()->route('admin.index')
            ->with('success', 'Mise à jour avec succès de cellule.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cellule = \App\Models\Cellule::findOrFail($id);

        $cellule->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Suppression avec succès de role.');
    }
}
