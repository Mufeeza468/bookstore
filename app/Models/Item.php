<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'book_id', 'quantity', 'subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}