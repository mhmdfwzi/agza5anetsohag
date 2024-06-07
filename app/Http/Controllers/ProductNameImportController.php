<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;

class ProductNameImportController extends Controller
{
    //

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ProductsImport, $request->file('file'));

            return redirect()->back()->with('toast_success', 'Products imported successfully.');
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            return redirect()->back()->with('toast_error', 'Import failed: ' . $e->getMessage());
        }
    }
}
