<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        "name",
        "description",
        "price",
        "category_id",
        "subcategory_id",
        "stock",
        "image"
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class)->with('user');
    }
}
