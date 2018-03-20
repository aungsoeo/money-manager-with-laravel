@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-1">
            <div class="panel panel-default">
              <header id="fh5co-header">

                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                      <h1 id="fh5co-logo"><a href="{{ url('/home') }}"><sup>$$</sup>ဝင္ေငြထြက္ေငြ ဆန္းစစ္မယ္ <sup>$$</sup></a></h1>
                    </div>

                  </div>

                </div>

              </header>
              <!-- END #fh5co-header -->
              <div class="container-fluid">
                <div class="row fh5co-post-entry">

                  <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                      <a href="{{ url('/income') }}"><img src="images/income.gif" style="width:500px; width:500px; !important" alt="Image" class="img-responsive"></a>
                    </figure>
                    <span class="fh5co-meta"><a href="{{ url('/income') }}">ဝင္ေငြ</a></span>
                  </article>
                        <div class="clearfix visible-xs-block"></div>
                  <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                      <a href="{{ url('/outcome') }}"><img src="images/out.jpg" style="width:200px; width:200px; !important" alt="incmome" class="img-responsive"></a>
                    </figure>
                    <span class="fh5co-meta"><a href="{{ url('/outcome') }}">ထြက္ေငြ</a></span>
                  </article>

                        <div class="clearfix visible-xs-block"></div>

                  <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                      <a href="{{ url('/save') }}"><img src="images/savemoney.jpg" style="width:200px; width:200px; !important" alt="Image" class="img-responsive"></a>
                    </figure>
                    <span class="fh5co-meta"><a href="{{ url('/save') }}">ပိုက္ပိုက္စုမယ္</a></span>
                  </article>

                        <div class="clearfix visible-xs-block"></div>
                  <article class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box">
                    <figure>
                      <a href="{{ url('/total') }}"><img src="images/outcome.png" style="width:200px; width:200px; !important" alt="Image" class="img-responsive"></a>
                    </figure>
                    <span class="fh5co-meta"><a href="{{ url('/total') }}">စာရင္းၾကည့္မယ္</a></span>

                  </article>

                  <div class="clearfix visible-xs-block"></div>
                  <div class="clearfix visible-lg-block visible-md-block visible-sm-block visible-xs-block"></div>

                </div>
              </div>

              @include('layouts.footer')
            </div>
        </div>
    </div>
</div>
@endsection
