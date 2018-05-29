@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add new income page!</title>
</head>
<body>
	<div class="container">
      <div class="row">
          <div class="col-md-offset-1">
              <div class="panel panel-default">
                <!-- END #fh5co-offcanvas -->
                <header id="fh5co-header">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 text-center">
                        <h1 id="fh5co-logo"><a href="index.html"><sup>$$</sup>စာရင္းအသစ္ထည့္မယ္<sup>$$</sup></a></h1>
                      </div>
                    </div>
                  </div>
                </header>
                <!-- END #fh5co-header -->
                <div class="container-fluid">
                    <div class="clearfix visible-xs-block"></div>
                      <div style="margin-top: 150px;">
                         @if ( count( $errors ) > 0 )
                        <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                              *{{ $error }}*<br>
                          @endforeach
                        </div>

                        @endif
                        <!-- for success message -->
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                      </div>

										  <form class="form-horizontal" action="{{ route('income.update', $income->id) }}" style="margin-left: 100px;" method="post">
                        {!! csrf_field() !!}

										    <div class="form-group">
										      <label class="control-label col-sm-2" for="income_name">Income Name:</label>
										      <div class="col-sm-10">
										        <input type="text" class="form-control" id="income_name" placeholder="Enter Income Name" name="income_name" style="width: 500px;" value="{{$income->income_name}}">
										      </div>
										    </div>
										    <div class="form-group">
										      <label class="control-label col-sm-2" for="amount">Income Amount:</label>
										      <div class="col-sm-10">
										        <input type="number" class="form-control" id="in_amount" placeholder="Enter Amount" name="in_amount" style="width: 500px;" value="{{$income->in_amount}}">
										      </div>
										    </div>
                         <div class="form-group">
                          <label class="control-label col-sm-2" for="save_name">Save Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="save_name" placeholder="Enter Income Name" name="save_name" style="width: 500px;" value="{{$income->save_name}}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="amount">Save Amount:</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="sav_amount" name="sav_amount" style="width: 500px;" value="{{$income->sav_amount}}">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-sm-2" for="outcome_name">Outcome Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="outcome_name" placeholder="Enter Income Name" name="outcome_name" style="width: 500px;" value="{{$income->outcome_name}}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="amount">OutCome Amount:</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="out_amount"  name="out_amount" style="width: 500px;" value="{{$income->out_amount}}">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="date" class="control-label col-sm-2">Date:</label>
                          <div class="col-sm-10">
                            <input type="date" id="date" class="form-control"  name="date" placeholder="DD/MM/YY" style="width: 500px;" value="{{$income->income_date}}" />
                          </div>
                        </div>
										     <div class="form-group">
										      <div class="col-sm-offset-2 col-sm-10">
										        <button type="submit" class="btn btn-success" >Update</button>
										      </div>
										    </div>
										  </form>
										</div>
                    <div align="right" style="margin-right: 200px;">
                      <a href="{{url('/income')}}"><button type="button" name="button" class="btn btn-primary">ေနာက္သို့</button></a>
                    </div><br>
                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function(){
      update_amounts();
       $('#in_amount').change(function() {
          update_amounts();
      });

      $('#sav_amount').change(function() {
          update_amounts();
      });
  });

  function update_amounts()
  {

      var income = $('#in_amount').val();
      var save = $('#sav_amount').val();
      var outcome  = (income-save);
      $('#out_amount').val(outcome);
  
  }
</script> 
@include('layouts.footer')
</html>
@endsection
