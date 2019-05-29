<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $table = 'staff';
    public $primaryKey = 'id';
    public $timestamps = true;
    public $fillable = [
      'fname','mname','lname',
      'tel','type_of_work','hours_per_day','wage_per_week'
    ];
}
