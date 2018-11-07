<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Auth;
use Validator;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $outcomes = Income::where('user_id', '=', $user_id)->paginate('10');
        return view('outcome.outcome')->with(compact('outcomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outcome.add_outcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Auth::user()->id;
        $outcome_name = $_POST['outcome_name'];
        $amount = $_POST['amount'];
        $outcome = [
            "user_id"=>$user_id,
            "outcome_name"=>$outcome_name,
            "out_amount"=>$amount,
            "outcome_date"=>$request->date
        ];
        $rule = [
            "outcome_name"=>"required",
            "out_amount"=>"required"
        ];
        $validator = Validator::make($outcome,$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect('/outcome/create')
                ->withErrors($validator);

        } else
        {
            Outcome::insert($outcome);
            return redirect('/outcome')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outcome = Outcome::find($id);
        return view('outcome.edit_outcome')->with(compact('outcome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $rule = [
            "outcome_name"=>"required",
            "amount"=>"required"
        ];
        $validator = Validator::make($request->all(),$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);

        } else
        {   

            $outcome = Outcome::find($id);
            $outcome->user_id = Auth::user()->id;
            $outcome->outcome_name = $request->outcome_name;
            $outcome->out_amount = $request->amount;
            $outcome->outcome_date = $request->date;
            $outcome->save();
            return redirect('/outcome')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Outcome::find($id)->delete();
        return redirect()->back()->with('message', 'ေရြွးခ်ယ္ထားေသာ စာရင္း ဖ်က္ျပီးပါျပီ။');
    }
}
