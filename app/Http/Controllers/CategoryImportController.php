<?php
namespace App\Http\Controllers;

use App\Imports\CategoriesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;


class CategoryImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new CategoriesImport, $request->file('file'));

            return redirect()->back()->with('success', 'Categories imported successfully.');
        } catch (\Exception $e) {
            Log::error('Import failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Import failed: ' . $e->getMessage());
        }
    }
}
