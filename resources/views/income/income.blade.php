@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>တစ္လဝင္ေငြၾကည့္မယ္</title>
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
                        <h1 id="fh5co-logo"><a href="index.html"><sup>$$</sup>ဝင္ေငြစာရင္းၾကည့္မယ္<sup>$$</sup></a></h1>
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
                          <td>{{number_format($income->in_amount)}}(က်ပ္)</td>
                          <td>{{number_format($income->out_amount)}}(က်ပ္)</td>
                          <td>{{number_format($income->sav_amount)}}(က်ပ္)</td>
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
                                echo number_format($in_total).'(က်ပ္)';
                                echo "</td>";

                                echo "<td>";
                                echo number_format($out_total).'(က်ပ္)';
                                echo "</td>";

                                echo "<td>";
                                echo number_format($sav_total).'(က်ပ္)';
                                echo "</td>";
                            ?>
                            
                        </tr>
                      </tbody>
                      @endif
                    </table>
                     {{ $incomes->links() }}
                    

                    <br><br>
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

@endsection
