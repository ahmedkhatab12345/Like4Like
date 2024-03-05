@extends('layouts.site.app')
@section('content')

<div class="MyContainer" style="width: 100%;
  margin: auto;
  margin-top: 10px;">
    <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom:70px;">

    <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">
      <h1 style="color: #ff0000; font-size: 50px;">تأكيد الدفع</h1>
    <img src="{{url('/')}}/website/assets/bankpayment.jpg" style="margin-right:90% ;-right: 10%; width: 100px; height: 40px;">
    <form  class="d-flex flex-column gap-4 w-100 justify-content-center align-items-center" style="padding-top: 50px; padding-left: 80%; border: gray;">
    <input  type="text" placeholder="الاسم على البطاقة" style="width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray;">
    <input type="text" placeholder="رقم البطاقة" style="width: 290px;border-radius: 5%;  height: 60px; padding: 10px; border: 2px solid gray;">
  </form>
  <div class="col-lg-5 col-md-6 col-12" style="width: 100%;  margin-top: 20px;  ">
  <input type="text" id="expDate" name="expDate" style="width: 130px; height: 60px; border-radius: 20; margin: 5px;" placeholder="MM / YY">
  <input type="text" id="cvvInput" name="cvv" maxlength="3" placeholder="CVV" style="width: 100px; height: 60px; border-radius: 20; margin: 5px; ">
      </div>
    </div>
    <a style="margin: 20px; padding-right: 80%;" href="{{route('website.index')}}">
    <button style="width: 10%;padding: 10px; background-color: #FF0000; outline: none;border:none; color: white; border-radius: 5px;">تسجيل</button>
    </a>
  </div>
@endsection
