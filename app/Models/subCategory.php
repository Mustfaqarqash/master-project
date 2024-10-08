<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subCategory extends Model
{
    use HasFactory , softDeletes;
    protected $fillable = ['name','category_id' , 'image'];

    public function category(){
        return $this->belongsTo(category::class);
    }
}
