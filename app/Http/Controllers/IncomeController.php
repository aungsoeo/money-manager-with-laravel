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
      $incomes = Income::where('user_id', '=', $user_id)->get();
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
    	$amount = $_POST['amount'];
        $income_date = $_POST['date'];
    	$income = [
    		"user_id"=>$user_id,
    		"income_name"=>$income_name,
    		"amount"=>$amount,
            "income_date"=>$income_date
    	];
    	$rule = [
    		"income_name"=>"required",
    		"amount"=>"required"
    	];
    	$validator = Validator::make($income,$rule);

    	if ($validator->fails())
    	{
	        $messages = $validator->messages();
	        return redirect('/addincome')
	            ->withErrors($validator);

	    } else
	    {
    		Income::insert($income);
	        return redirect('/income')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
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
            "amount"=>"required"
        ];
        $validator = Validator::make($request->all(),$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect('/addincome')
                ->withErrors($validator);

        } else
        {   
            $income = Income::find($request->id);
            $income->user_id = Auth::user()->id;
            $income->income_name = $request->income_name;
            $income->amount = $request->amount;
            $income->income_date = $request->date;
            $income->save();
            return redirect('/income')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
        }

    }

    public function delete($id)
    {   
        $income = Income::find($id)->delete();
        return redirect()->back()->with('message', 'ေရြွးခ်ယ္ထားေသာ ဝင္ေငြစာရင္း ဖ်က္ျပီးပါျပီ။');
    }
}
