<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_id',
        'products_id',
        'total_product',
        'subtotal',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sales_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
