<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class State extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
  ];

  public function cities(): HasMany
  {
    return $this->hasMany(City::class);
  }

  public function ads(): HasManyThrough
  {
    return $this->hasManyThrough(Ads::class,City::class);
  }
}
