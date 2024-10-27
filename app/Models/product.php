<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'quantity',
        'store_id',
        'sub_category_id',
        'image_id',
        'expire_date'
    ];

    /**
     * Relationship to the SubCategory model.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Relationship to the Store model.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Access the image associated with the product.
     */
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(ProductFeedback::class);
    }

    public function rates()
    {
        return $this->hasMany(ProductRate::class);
    }

    public function favorites()
    {
        return $this->hasMany(ProductFavorite::class);
    }
}
