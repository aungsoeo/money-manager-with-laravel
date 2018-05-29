@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ထြက္ေငြစာရင္</title>
  </head>

<div class="container">
    <div class="row">
        <div class="col-md-offset-1">
            <div class="panel panel-default">
              <!-- END #fh5co-offcanvas -->
              <header id="fh5co-header">

                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                      <h1 id="fh5co-logo"><a href="{{ url('/home') }}"><sup>$$</sup>ထြက္ေငြစာရင္းၾကည့္မယ္<sup>$$</sup></a></h1>
                    </div>

                  </div>

                </div>

              </header>
              <!-- END #fh5co-header -->
              <div class="container-fluid">
                    <table class="table table-bordered">
                      <thead >
                        <tr>
                          <th>စဥ္</th>
                          <th>ေန့စြဲ</th>
                          <th>ထြက္ေငြအမည္</th>
                          <th>ပမာဏ</th>
                        </tr>
                      </thead>
                       @if(sizeof($outcomes)==0)
                        <tbody>
                            <tr>
                              <td colspan="7" align="center"  style="color: red;">ထည့္သြင္းထားေသာအခ်က္အလက္မ်ားမရွိေသးပါ</td>  
                            </tr>
                        </tbody>
                      @else
                      <tbody>
                        @foreach($outcomes as  $index =>$outcome)
                        <tr>
                          <th scope="row">{{$index+1}}</th>
                          <td>{{ Carbon\Carbon::parse($outcome->outcome_date)->format('d-m-Y') }}</td>
                          <td>{{$outcome->outcome_name}}</td>
                          <td>{{number_format($outcome->out_amount)}}(က်ပ္)</td>
                        </tr>
                        @endforeach
                        <tr>
                          <th scope="row"></th>
                          <td></td>
                          <td colspan="1"><b>စုစုေပါင္း</b></td>
                          <td><?php
                                  $total=0;
                                foreach ($outcomes as $outcome) {

                                    $amount = $outcome->out_amount;
                                    $total = $total + $amount;
                                }
                                echo number_format($total);
                              ?>(က်ပ္)</td>
                        </tr>
                      </tbody>
                      @endif
                    </table>
                    {{ $outcomes->links() }}
                    <div >
                      <a href="{{url('/home')}}"><button type="button" name="button" class="btn btn-success">ေနာက္သို့</button></a>
                    </div><br>
                  </div>
                </div>
                @include('layouts.footer')
              
            </div>
        </div>
    </div>
</div>
<script>
setTimeout(() => {
  $('.success-msg').hide();
}, 5000);
  
</script>

@endsection
