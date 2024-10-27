<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offers_favorite extends Model
{
    protected $fillable = ['is_favorite', 'offer_id' , 'user_id'];

    // Relationship: Favorite belongs to an offer
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
