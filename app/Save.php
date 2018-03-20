<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $table = 'saves';
    protected $fillable =['user_id','save_name','amount','save_date'];
}
