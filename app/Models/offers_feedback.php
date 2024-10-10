<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offers_feedback extends Model
{
    protected $fillable = ['feedback', 'offer_id'];

    // Relationship: Feedback belongs to an offer
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
