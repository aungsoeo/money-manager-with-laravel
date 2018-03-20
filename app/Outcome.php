<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
   	protected $table = 'outcome';
	protected $fillable = [
		'user_id',
		'outcome_name',
		'amount',
	];
}
