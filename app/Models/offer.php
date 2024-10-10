<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class offer extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'offers_category_id', 'store_id'];
    protected $guarded = [];

    // Relationship: Offer belongs to a category
    public function category()
    {
        return $this->belongsTo(OffersCategory::class, 'offers_category_id');
    }

    // Relationship: Offer belongs to a store
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    // Relationship: Offer has many images
    public function images()
    {
        return $this->hasMany(offers_image::class, 'offer_id');
    }

    // Relationship: Offer has many rates
    public function rates()
    {
        return $this->hasMany(offers_rate::class, 'offer_id');
    }

    // Relationship: Offer has many favorites
    public function favorites()
    {
        return $this->hasMany(offers_favorite::class, 'offer_id');
    }

    // Relationship: Offer has many feedbacks
    public function feedbacks()
    {
        return $this->hasMany(offers_feedback::class, 'offer_id');
    }
}
