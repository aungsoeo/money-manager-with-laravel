<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =['user_id','income_id','outcome_id','save_id','total'];


    public function income()
    {
        return $this->belongsTo("App\Income", "income_id");
    }
    public function outcome()
    {
        return $this->belongsTo("App\Outcome", "outcome_id");
    }
    public function saves()
    {
        return $this->belongsTo("App\Save", "save_id");
    }
}
