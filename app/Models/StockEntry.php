<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'quantity',
        'document',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class)->withTrashed();
    }

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class)->withTrashed();
    }

}
