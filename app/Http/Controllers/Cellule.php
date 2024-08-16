<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Illuminate\Http\Request;

class Cellule extends Controller
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

    }

    public function getUsersCellule()
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }}
