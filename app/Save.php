<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    protected $tabel ='saves';
    protected $fillable =['save_name','amount','save_date'];
}
