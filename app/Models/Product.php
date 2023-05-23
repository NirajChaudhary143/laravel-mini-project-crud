<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id','product_name','category_id'
    ];
    // protected $table='products';
    protected $primaryKey='product_id';
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}

