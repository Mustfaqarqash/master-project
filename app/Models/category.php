<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subcategories(){
        return $this->hasMany(subcategory::class);
    }
}
