<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers_image extends Model
{
    use HasFactory;
    protected $fillable = ['offer_id' , 'path'];
    protected $guarded = [];

    // Relationship: Image belongs to an offer
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
