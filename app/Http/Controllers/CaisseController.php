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
use function auth;
use function dd;
use function file_exists;
use function ltrim;
use function now;
use function redirect;
use function time;
use function trim;
use function unlink;
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

        // Set default year and month if not provided
        $year = $year ? (int) $year : Carbon::now()->year;
        $month = $month ? (int) $month +1 : Carbon::now()->month;

        // Validate year and month
        if ($year < 1 || $month < 1 || $month > 12) {
            return redirect()->route('caisse.index')
                ->with('error', 'Invalid year or month.');
        }

        // Retrieve caisses for the specified year and month
        $caisses = Caisse::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        return view('caisse.index', [
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
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'montant' => ['required', 'numeric'],
                'libelle' => 'required',
                'AcheterPar' => 'required',
                'pieceJointe' => 'mimes:png,jpeg,jpg,csv,xls,pdf|max:2048'
            ]);
            $caisse = Caisse::findOrFail($id);
            // Initialize $pieceJointe as the current file path
            $pieceJointe = $caisse->pieceJointe;
            $existingPieceJointe = ltrim($pieceJointe, '/');

            // Check if a new file is being uploaded
            if ($request->hasFile('pieceJointe')) {
                $file = $request->file('pieceJointe');

                // Delete the existing file if it exists
                if ($existingPieceJointe && file_exists(public_path($existingPieceJointe))) {
                    unlink(public_path($existingPieceJointe));
                }

                // Store the new file
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads/pieceJoint', $fileName, 'public');
                $pieceJointe = '/storage/' . $filePath;
            }

            // Update the caisse record
            $caisse->update([
                'libelle' => $validatedData['libelle'],
                'montant' => $validatedData['montant'],
                'AcheterPar' => $validatedData['AcheterPar'],
                'pieceJointe' => $pieceJointe,
                'date' => now(),
                'user_id' => auth()->id()
            ]);

            return redirect()->route('caisse.index')
                ->with('success', 'mise a jour avec success.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'mise a jour avec erreur: ' . $e->getMessage()], 500);
        }
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
    public function destroy($id)
    {
        try{
            $caisse = Caisse::findOrFail($id);
            $pieceJointe = $caisse->pieceJointe;
            $existingPieceJointe = ltrim($pieceJointe, '/');
            if ($existingPieceJointe && file_exists(public_path($existingPieceJointe))) {
                unlink(public_path($existingPieceJointe));
            }
            $caisse->delete();
            return redirect()->route('caisse.index')
                ->with('success', 'enregistrement est supprime.');
        }catch(\Exception $e){
            return response()->json(['error' => 'Error Deleting record: ' . $e->getMessage()], 500);
        }
    }
}
