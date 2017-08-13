<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
  protected $table = 'income';

  protected $fillable = [
      'user_id',
      'income_name',
      'amount',
  ];

}
