<?php

namespace App\Http\Controllers;

use App\DataTables\CaisseDataTable;
use App\Models\caisse;
use App\Http\Requests\StorecaisseRequest;
use App\Http\Requests\UpdatecaisseRequest;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
use function redirect;
use function view;
use Carbon\Carbon;


class CaisseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year = null, $month = null)
    {
        Carbon::setLocale('fr_MA');
        if (is_null($year) || is_null($month)) {
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
        }
        $caisses = Caisse::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();
        return view('caisse.index' ,[
            'caisses' => $caisses
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('caisse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'montant' => ['required', 'numeric'],
            'libelle' => 'required',
            'AcheterPar' => 'required',
            'pieceJointe' => 'required|mimes:png,jpeg,jpg,csv,xls,pdf|max:2048'
        ]);
        $caisse = new Caisse();
        if($request->hasFile('pieceJointe')) {
            $file = $request->file('pieceJointe');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/pieceJoint', $fileName, 'public');
            $caisse->pieceJointe = '/storage/' . $filePath;
        }
            $caisse->libelle = $validatedData['libelle'];
            $caisse->montant = $validatedData['montant'];
            $caisse->AcheterPar = $validatedData['AcheterPar'];
            $caisse->date = now();
            if(auth()->id()){
                $caisse->user_id = auth()->id() ;
            }else{
                return new Error('User not connected');
            }
            $caisse->save();
            return redirect()->route('caisse.index')
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
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
     * Upload the specific Caisse piece Joint
     */
    public function upload($id)
    {
        try {
            // Retrieve the Caisse record
            $caisse = Caisse::findOrFail($id);

            // Ensure no leading slash in pieceJointe
            $filePath =  ltrim($caisse->pieceJointe, '/');
//            dd($filePath);
            // Check if the file exists
            if (file_exists($filePath)) {
                return response()->download($filePath);
            } else {
                return response()->json(['error' => 'File not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving file: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(caisse $caisse)
    {
        //
    }
}
