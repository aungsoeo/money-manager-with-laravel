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
                <div class="row fh5co-post-entry">
                  <table class="table table-bordered">
                    <thead >
                      <tr>
                        <th>NO</th>
                        <th>Date</th>
                        <th>Income Name</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($incomes as $income)
                      <tr>
                        <th scope="row">{{$income->id}}</th>
                        <td>{{ Carbon\Carbon::parse($income->created_at)->format('d-m-Y ') }}</td>
                        <td>{{$income->income_name}}</td>
                        <td>{{$income->amount}}(က်ပ္)</td>
                      </tr>
                      @endforeach
                      <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td colspan="1"><b>စုစုေပါင္း</b></td>
                        <td>{{$income->amount}}(က်ပ္)</td>
                      </tr>
                    </tbody>
                  </table>

                        <div class="clearfix visible-xs-block"></div>


                  <div class="clearfix visible-xs-block"></div>
                  <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>

                </div>
              </div>

              <footer id="fh5co-footer">
                <p><small>&copy; 2017. All Rights Reserverd. <br> Designed by <a href="#" target="_blank">ေအာင္စိုးဦး</a>  Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small></p>
              </footer>
            </div>
        </div>
    </div>
</div>


@endsection
