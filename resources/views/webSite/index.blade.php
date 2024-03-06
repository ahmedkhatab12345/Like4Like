@extends('layouts.site.app')
@section('content')    
  <!--Start Body-->
  <div class="MyContainer" style="width: 100%;
  margin: auto;
  margin-top: 20px;">
    <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom: 100px;">
    <div class="cards m-auto gap-4 row" style="align-items: center; justify-content: center; padding-left: 40px;">

    @foreach($works as $work)
      
      <div class="card col-xl-4 col-lg-4 col-md-6 col-12" style="width: 20rem; padding: 10px;border: 1px solid #000000 !important;
      box-shadow: 0px 0px 10px 0px #0000000D !important;">
        <img src="{{asset('images/dashboard/works/'.$work->photo)}}" class="card-img-top" style="height: 300px;" alt="card image">
        <div class="card-body">
          <p class="card-text">{{$work->description}}</p>
          <div class="d-flex flex-column align-items-center">
            <a href="#" class="btn btn-primary" style="background-color: #0038FF; outline: none; border: none;">تنفيذ</a>
            <a href="submit.html" class="btn btn-primary w-30 mt-2"
              style="background-color: #FF0000; outline: none;  border: none;">اكمال</a>
          </div>
        </div>
      </div>
    @endforeach
      


    </div>
  </div>
  <!--End Body-->

  @endsection
