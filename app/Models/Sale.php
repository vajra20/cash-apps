<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_sale',
        'total_price',
        'customers_id',
        'created_by',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id', 'id');
    }

    public function detailsale()
    {
        return $this->hasMany(DetailSale::class, 'sales_id', 'id');
    }
}
