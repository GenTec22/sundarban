<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id', 'product_id', 'qty','price','service','tax','amount'];
    public function invoice(){
        return $this->belongsTo('App\Models\Invoice');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }
}
