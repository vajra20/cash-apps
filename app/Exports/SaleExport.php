<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SaleExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new SaleExportFull();
        $sheets[] = new DetailSaleExport();

        return $sheets;
    }
}
