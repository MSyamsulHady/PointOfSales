@extends('layouts.navhed')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
              <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                  <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="h1">
                    <p>welcome back {{ Auth::user()->name }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!--  Row 1 -->


@include('layouts.footer')
@endsection
