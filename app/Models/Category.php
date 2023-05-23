<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_id','name'
    ];
    // protected $table='categories';
    protected $primaryKey='category_id';

    public function products(){
        return $this->hasMany(Product::class,'category_id','category_id');
    }

}
