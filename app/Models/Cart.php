<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'product_id',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(Category::class, 'user_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Category::class, 'product_id', 'id');
    }
}
