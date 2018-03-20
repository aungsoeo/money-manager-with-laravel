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
    	$income = [
    		"user_id"=>$user_id,
    		"income_name"=>$income_name,
    		"amount"=>$amount
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
        // dd($request->all());
        // $user_id=Auth::user()->id;
        // $income_name = $_POST['income_name'];
        // $amount = $_POST['amount'];

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
            $arr = [
                    "user_id"=>Auth::user()->id,
                    "income_name"=>$request->income_name,
                    "amount"=>$request->amount
                ];
            $income = Income::findOrFail($id);
            $income->fill($arr)->save();
            return redirect('/income')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
        }

    }

    public function delete($id)
    {   $user_id=$id;
        $income = Income::find($user_id);
        Income::deleteIncome($user_id);
        return redirect()->back()->with('message', 'ေရြွးခ်ယ္ထားေသာ ဝင္ေငြစာရင္း ဖ်က္ျပီးပါျပီ။');
    }
}
