<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DetailSaleExport implements FromCollection, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $products = Product::all();
        $export = [];

        $export[] = [
            'ID PRODUCTS',
            'STOCK PRODUCTS',
            'PRICE PRODUCTS',
            'IMAGE PRODUCTS',
        ];

        foreach ($products as $product) {
            $export[] = [
                'id' => $product->id,
                'name' => $product->name,
                'stock' => $product->name,
                'price' => $product->name,
                'image' => $product->name,
            ];
        }

        return collect($export);
    }
}
