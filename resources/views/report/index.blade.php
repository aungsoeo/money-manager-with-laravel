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
                        <h1 id="fh5co-logo"><sup>$$</sup>စာရင္းေပါင္းခ်ဳပ္<sup>$$</sup></h1>
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
                          <th>နေ့စွဲ</th>
                          <th>ဝင္ေငြ</th>
                          <th>ထြက္ေငြ</th>
                          <th>စုေငြ</th>
                        </tr>
                      </thead> 
                      @if(sizeof($reports)==0)
                        <tbody>
                            <tr>
                              <td colspan="7" align="center"  style="color: red;">ထည့္သြင္းထားေသာအခ်က္အလက္မ်ားမရွိေသးပါ</td>  
                            </tr>
                        </tbody>
                      @else
                      <tbody>

                        @foreach($reports as $index =>$r)
                        <tr>
                          <th scope="row">{{$index+1}}</th>
                          <td>{{ Carbon\Carbon::parse($r->income_date)->format('d-m-Y') }}</td>
                          <td style="text-align: right;">{{number_format($r->in_amount)}}</td>
                          <td style="text-align: right;">{{number_format($r->out_amount)}}</td>
                          <td style="text-align: right;">{{number_format($r->sav_amount)}}</td>
                        </tr>
                        @endforeach
    
                        <tr>
                          <th scope="row"></th>
                          <td colspan="1"><b>စုစုေပါင္း</b></td>
                          <?php
                                $in_total=0;
                                $out_total=0;
                                $sav_total=0;
                                foreach ($reports as $total) {
                                    $in_amount = $total->in_amount;
                                    $in_total = $in_total + $in_amount;

                                    $out_amount = $total->out_amount;
                                    $out_total = $out_total + $out_amount;

                                    $sav_amount = $total->sav_amount;
                                    $sav_total = $sav_total + $sav_amount;
                                }
                                echo '<td style="text-align: right;">';
                                echo number_format($in_total);
                                echo "</td>";

                                echo '<td style="text-align: right;">';
                                echo number_format($out_total);
                                echo "</td>";

                                echo '<td style="text-align: right;">';
                                echo number_format($sav_total);
                                echo "</td>";
                            ?>
                            
                        </tr>
                      </tbody>
                       @endif
                    </table>
                    {{ $reports->links() }}
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

@endsection

