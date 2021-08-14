@extends('layouts.app')

@section('content')
<?php 
  $keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
  $from = isset($_GET['from'])?$_GET['from']:'';
  $to = isset($_GET['to'])?$_GET['to']:'';
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-1">
            <div class="panel panel-default">
              <!-- END #fh5co-offcanvas -->
              <header id="fh5co-header">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                      <h1 id="fh5co-logo"><a href="index.html"><sup>$$</sup>ဝင္ေငြစာရင္းၾကည့္မယ္<sup>$$</sup></a></h1>
                    </div>
                  </div>
                </div>
              </header>
              <!-- END #fh5co-header -->

              <div class="container-fluid">
                <div class="row" style="margin-left:2px;">
                  <form id="filter_form" class="form-inline" action="{{route('income.index')}}" method="GET">
                    <div class="form-group mb-2">
                      <input type="text" onchange="chagneFormat1(this)"  class="form-control" name="keyword" id="keyword" placeholder="Search" value="{{ $keyword }}">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                     <input type="text" placeholder="Start date" id="start_date" name="from" class="form-control" value="{{ $from }}">
                     <span>~</span>
                     <input type="text" placeholder="End date" id="end_date" name="to" class="form-control" value="{{ $to }}">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 search_btn">Search</button>
                  </form>
                </div>
                <div class="row"><br></div>
                  <table class="table table-bordered">
                    <thead >
                      <tr>
                        <th>စဥ္</th>
                        <th>နေ့စွဲ</th>
                        <th>ဝင္ေငြ အမည္</th>
                        <th>ဝင္ေငြ</th>
                        <th>ထြက္ေငြ</th>
                        <th>စုေငြ</th>
                        <th style="width:240px;">Action</th>
                      </tr>
                    </thead>
                    @if(sizeof($incomes) == 0)
                      <tbody>
                          <tr>
                            <td colspan="7" align="center" style="color: red;">ထည့္သြင္းထားေသာအခ်က္အလက္မ်ားမရွိေသးပါ</td>  
                          </tr>
                      </tbody>
                    @else
                    <tbody>
                      @foreach($incomes as  $index =>$income)
                      <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{ Carbon\Carbon::parse($income->income_date)->format('d-m-Y') }}</td>
                        <td>{{$income->income_name}}</td>
                        <td>{{number_format($income->in_amount)}}(ကျပ်)</td>
                        <td>{{number_format($income->out_amount)}}(ကျပ်)</td>
                        <td>{{number_format($income->sav_amount)}}(ကျပ်)</td>
                        <td>
                          <a href="{{ route('income.delete', $income->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                          <a href="{{ route('income.edit', $income->id) }}">
                            <button type="button" name="button" class="btn btn-small btn-info">Edit</button>
                          </a>

                        </td>
                      </tr>
                      @endforeach
  
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td colspan="1"><b>စုစုေပါင္း</b></td>
                        <?php
                              $in_total=0;
                              $out_total=0;
                              $sav_total=0;
                              foreach ($incomes as $total) {
                                  $in_amount = $total->in_amount;
                                  $in_total = $in_total + $in_amount;

                                  $out_amount = $total->out_amount;
                                  $out_total = $out_total + $out_amount;

                                  $sav_amount = $total->sav_amount;
                                  $sav_total = $sav_total + $sav_amount;
                              }
                              echo "<td>";
                              echo number_format($in_total).'(ကျပ်)';
                              echo "</td>";

                              echo "<td>";
                              echo number_format($out_total).'(ကျပ်)';
                              echo "</td>";

                              echo "<td>";
                              echo number_format($sav_total).'(ကျပ်)';
                              echo "</td>";
                          ?>
                          
                      </tr>
                    </tbody>
                    @endif
                  </table>
                   {{ $incomes->links() }}
                  

                  <br><br>
                  <div >
                    <a href="{{url('/home')}}"><button type="button" name="button" class="btn btn-success">နောက်သို့</button></a>
                  </div><br>
                </div>
              </div>
              @include('layouts.footer')

            </div>
        </div>
    </div>
</div>
<script src="{{asset('/dcalendar.picker.js')}}"></script>
<script>
  $('#start_date').dcalendarpicker({
     format: 'yyyy-mm-dd'

  });
  $('#end_date').dcalendarpicker({
     format: 'yyyy-mm-dd'
  });
  // $('#calendar-demo').dcalendar(); //creates the calendar
  // $('.search_btn').click(function(event) {
  //     var str1 = $('#start_date').val();
  //     var from = (str1.split('/').join('-'));
  //     $('#from').val(from);

  //     var str2 = $('#end_date').val();
  //     var to = (str2.split('/').join('-'));
  //     $('#to').val(to);

  //     $('#filter_form').submit();
  // });
</script>

@endsection
