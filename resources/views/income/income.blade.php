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
                  <div >
                      <a href="{{ url('/addincome')}}">
                        <button type="button" name="button" class="btn btn-success">စာရင္းအသစ္ထည့္မယ္</button>
                      </a>
                  </div><br>
                    <div class="clearfix visible-xs-block"></div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success success-msg">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                  </div>

                    <table class="table table-bordered">
                      <thead >
                        <tr>
                          <th>စဥ္</th>
                          <th>ေန့စြဲ</th>
                          <th>ဝင္ေငြ အမည္</th>
                          <th>ပမာဏ</th>
                          <th style="width:240px;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($incomes as $income)
                        <tr>
                          <th scope="row">{{$income->id}}</th>
                          <td>{{ Carbon\Carbon::parse($income->income_date)->format('d-m-Y') }}</td>
                          <td>{{$income->income_name}}</td>
                          <td>{{number_format($income->amount)}}(က်ပ္)</td>
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
                          <td><?php
                                  $total=0;
                                foreach ($incomes as $income) {

                                    $amount = $income->amount;
                                    $total = $total + $amount;
                                }
                                echo number_format($total);
                              ?>(က်ပ္)</td>
                        </tr>
                      </tbody>
                    </table>
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
<script>
setTimeout(() => {
  $('.success-msg').hide();
}, 5000);
  
</script>
