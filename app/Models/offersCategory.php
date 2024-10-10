<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offersCategory extends Model
{
    protected $fillable = ['name', 'image'];

    // Relationship: One category can have many subcategories (self-referencing)
    public function subcategories()
    {
        return $this->hasMany(offersCategory::class, 'parent_id');
    }

    // Relationship: A subcategory belongs to a parent category
    public function parent()
    {
        return $this->belongsTo(offersCategory::class, 'parent_id');
    }

    // Relationship: One category has many offers
    public function offers()
    {
        return $this->hasMany(Offer::class, 'offers_category_id');
    }
}

