@extends('layouts.site.app')
@section('content')

<div class="MyContainer" style="width: 100%; margin: auto; margin-top: 10px;">
    <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom:70px;">
    {{-- <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">
        <h1 style="color: #ff0000; font-size: 50px;">تأكيد الدفع</h1>
        <p style="font-size: 30px; padding-right: 20px;"> إيبسوم، أو ليبسوم كما يعرف أحياناً</p>
        <input  type="text" placeholder="رابط انستا باي" style="padding-right: 20px; width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray; margin: 20px;">
        <div id="imageBox" style="margin: 20px;">
            <input type="file" id="imageInput" accept="image/*" >
        </div >
    </div> --}}

    <form method="post"  action="{{route('subscription')}}">
        @csrf
        <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">
            <h1 style="color: #ff0000; font-size: 50px;">تأكيد الدفع</h1>
            <p style="font-size: 30px; padding-right: 20px;"> إيبسوم، أو ليبسوم كما يعرف أحياناً</p>
        <input  type="text" placeholder="رابط انستا باي" style="padding-right: 20px; width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray; margin: 20px;">
        <br><br>
        <div id="imageBox" style="margin: 20px;">
            <input type="file" id="imageInput" accept="image/*" >
        </div >
        <a style="margin: 20; padding-right: 80%;" href="{{route('website.index')}}">
            <button type="button" id="moveButton"  style="
                background-color: red;
                outline: none;
                color: white;
                border: none;
                padding-left: 5px 20px; width: 100px; height: 50px; ">
                        متابعة
            </button>
        </a>
    </form>
</div>
@endsection
