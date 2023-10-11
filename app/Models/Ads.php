<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ads extends Model
{
  use HasFactory;

  protected $fillable = [
    'id', 'title', 'description', 'price', 'is_negotiable', 'image_path', 'is_active', 'sub_category_id','city_id', 'user_id','created_at','updated_at',
    'expire_at'
  ];
  protected $casts = [ 'expire_at'=>'datetime'];


  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(SubCategory::class,'sub_category_id','id');
  }



  public function city(): BelongsTo
  {
    return $this->belongsTo(City::class);
  }
}
