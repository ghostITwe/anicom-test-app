<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'description',
        'category_id',
        'image',
        'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getPrice()
    {
        return $this->price / 100;
    }
}
