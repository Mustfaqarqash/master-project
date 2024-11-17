<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_status',
        'order_total_price',
        'user_id',
        'note',
        'store_id ',
        'address_id'
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function order_detail(){
        $this->hasMany(order_detail::class);
    }


}
