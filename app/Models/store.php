<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class store extends Model
{
    use HasFactory  ,softDeletes;
    protected $table='stores';
    protected $fillable=['name','description','website','whatsapp' ,'image','city_id'];
    public function city(){
        return $this->belongsTo(city::class);
    }
}
