@extends('layouts.app')

@section('content')
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

										  <form class="form-horizontal" action="{{ route('save.update', $save->id) }}" style="margin-left: 100px;" method="post">
                        {!! csrf_field() !!}

										    <div class="form-group">
										      <label class="control-label col-sm-2" for="save_name">Save Name:</label>
										      <div class="col-sm-10">
										        <input type="text" class="form-control" id="save_name" placeholder="Enter Save Name" name="save_name" style="width: 500px;" value="{{$save->save_name}}">
										      </div>
										    </div>
										    <div class="form-group">
										      <label class="control-label col-sm-2" for="amount">Amount:</label>
										      <div class="col-sm-10">
										        <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount" style="width: 500px;" value="{{$save->amount}}">
										      </div>
										    </div>
                        <div class="form-group">
                          <label for="date" class="control-label col-sm-2">Save Date:</label>
                          <div class="col-sm-10">
                            <input type="date" id="date" class="form-control"  name="date" placeholder="DD/MM/YY" style="width: 500px;" value="{{$save->save_date}}" />
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
                      <a href="{{url('/income')}}"><button type="button" name="button" class="btn btn-primary">နောက်သို့</button></a>
                    </div><br>
                  </div>
              </div>
          </div>
      </div>
  </div>
@include('layouts.footer')

@endsection
