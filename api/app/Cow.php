<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
  public $table = 'cow';
  public $primaryKey = 'id';
  public $timestamps = true;
  public $fillable = [
    'name','gender','age','weight'
  ];
}
