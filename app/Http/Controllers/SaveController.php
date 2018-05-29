<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Auth;
use App\User;
use Validator;

class SaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::user()->id;
        $saves = Income::where('user_id', '=', $user_id)->paginate('5');
        return view('save.index')->with(compact('saves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('save.add');
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
        $save_name = $_POST['save_name'];
        $amount = $_POST['amount'];
        $save = [
            "user_id"=>$user_id,
            "save_name"=>$save_name,
            "sav_amount"=>$amount,
            "save_date"=>$request->date
        ];
        $rule = [
            "save_name"=>"required",
            "sav_amount"=>"required",
            "save_date"=>"required"
        ];
        $validator = Validator::make($save,$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect('/save/create')
                ->withErrors($validator);

        } else
        {
            Save::insert($save);
            return redirect('/save')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
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
        $save = Save::find($id);
        return view('save.edit')->with(compact('save'));
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
            "save_name"=>"required",
            "sav_amount"=>"required",
            "date"=>"required"
        ];
        $validator = Validator::make($request->all(),$rule);

        if ($validator->fails())
        {
            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);

        } else
        {   
            $save = Save::find($request->id);
            $save->user_id = Auth::user()->id;
            $save->save_name = $request->save_name;
            $save->sav_amount = $request->amount;
            $save->save_date = $request->date;
            $save->save();
            return redirect('/save')->with('success','ဝင္ေငြစာရင္းအသစ္ ထည့္သြင္းမွုေအာင္ျမင္ပါသည္။');
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
        $save = Save::find($id)->delete();
        return redirect()->back()->with('message', 'ေရြွးခ်ယ္ထားေသာ ဝင္ေငြစာရင္း ဖ်က္ျပီးပါျပီ။');
    }
}
