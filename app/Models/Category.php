<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{

    protected $fillable = [
      'title',
      'parent_id'
    ];

    use HasFactory;
    use NodeTrait;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
