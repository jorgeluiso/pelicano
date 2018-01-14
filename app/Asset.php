<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
  /**
   * @brief The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'type',
    'plate',
    'serial',
    'year'
  ];
}
