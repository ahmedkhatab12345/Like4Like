@extends('layouts.site.app')
@section('content')
    <!--Start Body-->
    <div class="MyContainer" style="width: 100%;
    margin: auto;
    margin-top: 20px;">
        <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom: 100px;">
        <div class="cards m-auto gap-4 row" style="align-items: center; justify-content: center; padding-left: 40px;">
        <div class="card  col-lg-5 col-md-6 col-12" style="width: 20rem; padding: 10px; border: 1px solid #000000 !important;
        box-shadow: 0px 0px 10px 0px #0000000D !important;">
            <img src="{{url('/')}}/website/assets/card2.jpg" class="card-img-top" style="height: 300px;" alt="card image">
            <div class="card-body">
            <p class="card-text">بعض الأمثلة السريعة للنصوص التي يمكن البناء عليها على عنوان البطاقة وتشكل الجزء الأكبر من البطاقة
                محتوى.</p>
            <div class="d-flex flex-column align-items-center" id="app">
                <a href="#" class="btn btn-primary" style="background-color: #0038FF; outline: none; border: none;">تنفيذ</a>
                
                </div>
            </div>
        </div>




        </div>
    </div>
    <!--End Body-->

  @endsection
