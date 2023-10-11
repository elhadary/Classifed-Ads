<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
    'id', 'name','created_at','updated_at',
    ];

    public function ads(): HasManyThrough
    {
      return $this->hasManyThrough(Ads::class,SubCategory::class);
    }
    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class,'category_id','id');
    }




}
