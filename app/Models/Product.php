<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    
    public function category() {
        return $this->BelongsTo(Category::class);
    }
    protected $fillable = ['id','product_name','product_description','product_price',"category_id"];
}
