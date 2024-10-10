<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offers_rate extends Model
{
    protected $fillable = ['rate', 'offer_id'];

    // Relationship: Rate belongs to an offer
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
