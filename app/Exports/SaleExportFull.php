<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SaleExportFull implements FromCollection, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $sales =  Sale::all();
        $export = [];

        // ini buat headernya
        $export[] = ['ID PENJUALAN', 'TANGAL PENJUALAN', 'TOTAL HARGA', 'NAMA CUSTOMER', 'DIBUAT OLEH'];

        // sisanya di loop biar rapih
        foreach ($sales as $sale) {
            $export[] = [
                'id' => $sale->id,
                'date_sale' => $sale->date_sale,
                'total_price' => $sale->total_price,
                'customer' => $sale->customer->name,
                'created_by' => $sale->created_by
            ];
        }


        return collect($export);
    }

    public function title(): string
    {
        return 'Sales Full';
    }
}
