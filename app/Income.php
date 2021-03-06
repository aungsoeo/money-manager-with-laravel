<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
  protected $table = 'income';

  protected $fillable = [
      'user_id',
      'income_name',
      'in_amount',
      'outcome_name',
      'out_amount',
      'save_name',
      'sav_amount',
  ];

  public static function deleteIncome($user_id)
  {
    $result = DB::delete("DELETE FROM income WHERE user_id=$user_id");

    return $result;
  }

}
