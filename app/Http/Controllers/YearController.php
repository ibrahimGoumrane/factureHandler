<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function index($year = null)
    {
        Carbon::setLocale('fr_MA');

        // Set default year if not provided
        $year = $year ? (int) $year : Carbon::now()->year;

        // Validate year
        if ($year < 1) {
            return redirect()->route('year.index')
                ->with('error', 'Invalid year.');
        }

        // Retrieve all records for the specified year
        $caisses = Caisse::whereYear('date', $year)->get();

        // Initialize an array to hold the totals for each month
        $monthlyTotals = [];

        // Process each record
        foreach ($caisses as $caisse) {
            $monthName = Carbon::parse($caisse->date)->format('F'); // Full month name
            // Initialize the month in the totals array if it doesn't exist
            if (!isset($monthlyTotals[$monthName])) {
                $monthlyTotals[$monthName] = [
                    'debit' => 0,
                    'credit' => 0,
                    'total' => 0
                ];
            }

            // Accumulate debit and credit
            $monthlyTotals[$monthName]['debit'] += $caisse->debit ?? 0;
            $monthlyTotals[$monthName]['credit'] += $caisse->credit ?? 0;
            $monthlyTotals[$monthName]['total'] = $monthlyTotals[$monthName]['debit'] - $monthlyTotals[$monthName]['credit'];

            // Add month to each caisse record
            $caisse->month = $monthName;
        }

        return response()->json([
            'caisses' => $caisses,
            'monthlyTotals' => $monthlyTotals,
            'selectedYear' => $year
        ]);
    }

    public function getYears()
    {
        $currentYear = Carbon::now()->year;
        $years = range($currentYear - 10, $currentYear + 10);

        return response()->json($years);
    }
}
