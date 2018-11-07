<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Auth;
use App\Income;
use Illuminate\Http\Request;
use App\User;
use Validator;


class IncomeController extends Controller
{
    public function index()
    { $user_id=Auth::user()->id;
      $incomes = Income::where('user_id', '=', $user_id)->paginate('10');
      return view('income.income')->with(compact('incomes'));
    }

    public function add()
    {
    	return view('income.add_new_income');
    }

    public function store(Request $request)
    {   
    	$user_id=Auth::user()->id;
    	$income_name = $_POST['income_name'];
    	$in_amount = $_POST['in_amount'];
        $outcome_name = $_POST['outcome_name'];
        $out_amount = $_POST['out_amount'];
        $save_name = $_POST['save_name'];
        $sav_amount = $_POST['sav_amount'];
        $income_date = $_POST['date'];

    	$income = [
    		"user_id"=>$user_id,
    		"income_name"=>$income_name,
    		"in_amount"=>$in_amount,
            "outcome_name"=>$outcome_name,
            "out_amount"=>$out_amount,
            "save_name"=>$save_name,
            "sav_amount"=>$sav_amount,
            "income_date"=>$income_date
    	];

    	$rule = [
    		"income_name"=>"required",
    		"in_amount"=>"required"
    	];
    	$validator = Validator::make($income,$rule);

    	if ($validator->fails())
    	{
	        $messages = $validator->messages();
	        return redirect()->back()
	            ->withErrors($validator);

	    } else
	    {
    		Income::insert($income);
	        return redirect('/home')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
	    }

    }

    public function edit($id)
    {   
        $income = Income::find($id);
        return view('income.edit_income')->with(compact('income'));
    }

    public function update($id,Request $request)
    {   
        $rule = [
            "income_name"=>"required",
            "in_amount"=>"required"
        ];
        $validator = Validator::make($request->all(),$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);

        } else
        {   
            $income = Income::find($request->id);
            $income->user_id = Auth::user()->id;
            $income->income_name = $request->income_name;
            $income->in_amount = $request->in_amount;
            $income->outcome_name = $request->outcome_name;
            $income->out_amount = $request->out_amount;
            $income->save_name = $request->save_name;
            $income->sav_amount = $request->sav_amount;
            $income->income_date = $request->date;
            $income->save();
            return redirect('/home')->with('success','ဝင္ေငြစာရင္းအသစ္ ျပင္ဆင္မွုေအာင္ျမင္ပါသည္။');
        }

    }

    public function delete($id)
    {   
        $income = Income::find($id)->delete();
        return redirect()->back()->with('message', 'ေရြွးခ်ယ္ထားေသာ ဝင္ေငြစာရင္း ဖ်က္ျပီးပါျပီ။');
    }
}
