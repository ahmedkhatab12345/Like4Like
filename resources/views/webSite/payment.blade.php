@extends('layouts.site.app')
@section('content')
<div class="MyContainer" style="width: 100%;
  margin: auto;
  margin-top: 10px;">
    <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom:70px;">
    <form action="{{ route('storeSubscription') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 style="color: #ff0000; font-weight: bold; font-size: 50px;">تأكيد طريقه الدفع</h1>

    <select name="payment_method" id="payment_method" style="width: 300px; background-color:white; border-radius: 30%; height: 80px; font-size:x-large ; margin: 20px; padding-right: 30px; border: #ff0000;">
        <option value=""  style="font-size: large; font-weight: bold;">اختر طريقة الدفع</option>
        <option value="vcash"  style="font-size: large; font-weight: bold;">فودافون كاش</option>
        <option value="ipa"  style="font-size: large; font-weight: bold;">انستا باي</option>
    </select>

    <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; margin-top: 20px;">
        <input name="phone_number"  type="text"  style="padding-right: 20px; width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray; margin: 20px;">        
        <div id="imageBox" style="margin: 20px;">
        <input name="photo" type="file" id="imageInput" accept="image/*" >
        </div>
    
    <button type="submit"  style="margin-top: 20px; background-color: #ff0000; color: white; font-size: large; padding: 10px 30px; border: none; border-radius: 5px;">اشتراك</button>
    </div>

</form>

    @endsection
