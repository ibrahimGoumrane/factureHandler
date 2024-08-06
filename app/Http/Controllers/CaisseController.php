<?php

namespace App\Http\Controllers;

use App\DataTables\CaisseDataTable;
use App\Models\caisse;
use App\Http\Requests\StorecaisseRequest;
use App\Http\Requests\UpdatecaisseRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
use function view;

class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $caisses = Caisse::all();
        return view('caisse.index' ,[
            'caisses' => $caisses
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecaisseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(caisse $caisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(caisse $caisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecaisseRequest $request, caisse $caisse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(caisse $caisse)
    {
        //
    }
}
