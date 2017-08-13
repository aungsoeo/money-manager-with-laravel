<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Auth;
use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    { $user_id=Auth::user()->id;
      $incomes = Income::where('user_id', '=', $user_id)->get();
      return view('app.income')->with(compact('incomes'));;
    }
}
