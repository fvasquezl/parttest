<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    protected $guarded = [];

//    public function category(): BelongsTo
//    {
//        return $this->belongsTo(Category::class);
//    }
//
//    public function subCategory(): BelongsTo
//    {
//        return $this->belongsTo(SubCategory::class);
//    }
}
