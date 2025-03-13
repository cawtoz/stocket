<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockExit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'customer_id',
        'quantity',
        'document',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class)->withTrashed();
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class)->withTrashed();
    }

}
