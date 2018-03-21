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
                       
                        <tr>
                          
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

