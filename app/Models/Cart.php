<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
