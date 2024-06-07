<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\ProductName;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;

class ProductsImport implements ToModel, WithHeadingRow, WithStartRow, SkipsOnFailure
{
    use SkipsFailures;

    public function startRow(): int
    {
        return 2; // Assuming the first row is the header
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {
            // Skip the row if the 'name' field is empty
            if (empty($row['name'])) {
                $rowNumber = $row['__row'] ?? 'unknown';
                Log::warning("Skipping row $rowNumber: 'name' field is empty.");
                return null;
            }

            return new ProductName([
                'name' => $row['name'],
                'note' => $row['note'],
            ]);
        } catch (\Exception $e) {
            $rowNumber = $row['__row'] ?? 'unknown';
            Log::error("Error processing row $rowNumber: " . $e->getMessage());
            return null; // Skip this row if there is an error
        }
    }

    public function onFailure(Failure ...$failures)
    {
        // This method is for handling validation failures
        foreach ($failures as $failure) {
            Log::error("Validation error on row {$failure->row()}: " . implode(', ', $failure->errors()));
        }
    }
}
