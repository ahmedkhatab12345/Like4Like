@extends('layouts.site.app')
@section('content')
<div class="MyContainer" style="width: 100%;
  margin: auto;
  margin-top: 10px;">
    <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom:70px;">
<form action="{{ route('storeSubscription') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">

        <h1 style="color: #ff0000; font-weight: bold; font-size: 50px;">تأكيد الدفع</h1>

        <select name="payment_method" id="payment_method" style="width: 300px; background-color:white; border-radius: 30%; height: 80px; font-size:x-large ; margin: 20px; padding-right: 30px; border: #ff0000;">
            <option value=""  style="font-size: large; font-weight: bold;">اختر طريقة الدفع</option>
            <option value="vcash"  style="font-size: large; font-weight: bold;">فودافون كاش</option>
            <option value="ipa"  style="font-size: large; font-weight: bold;">انستا باي</option>
        </select>

        <div  class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-right: 90%;padding-top: 30px; padding-bottom: 30px; ">
          </div>
    </div>
        {{--------------- vcash -------------------}}
        <div id="vcash_group" style="display: none;">
            <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">
                <input  type="text" placeholder="رقم الهاتف" style="padding-right: 20px; width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray; margin: 20px;">
                <div id="imageBox" style="margin: 20px;">
                    <input type="file" id="imageInput" accept="image/*" >
                </div >
            </div>
        </div>

        {{--------------- ipa ------------}}
        <div id="insta_link_group" style="display: none;">
            <div class="col-lg-5 col-md-6 col-12" style="width: 100%; padding-inline: 5px;  padding-right: 40px; ">
                <input  type="text" placeholder="رابط انستا باي" style="padding-right: 20px; width: 290px; height: 60px; border-radius: 5%; padding: 10px; border: 2px solid gray; margin: 20px;">
                <br><br>
                <div id="imageBox" style="margin: 20px;">
                    <input type="file" id="imageInput" accept="image/*" >
                </div >
            </div>
        </div>



    <a style="margin: 20; padding-right: 80%;" href="{{route('website.index')}}">
        <button type="button" id="moveButton"  style="
            background-color: red;
            outline: none;
            color: white;
            border: none;
            padding-left: 5px 20px; width: 100px; height: 50px; ">
                    متابعة
        </button>
</form>

<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        var instaLinkGroup = document.getElementById('insta_link_group');
        var phoneInput = document.getElementById('phone_number');
        var photoInput = document.getElementById('photo');

        if (this.value === 'ipa') {
            instaLinkGroup.style.display = 'block';
            vcash_group.style.display = 'none';
            // phoneInput.style.display = 'none';
            // photoInput.style.display = 'none';
        } else if (this.value === 'vcash') {
            instaLinkGroup.style.display = 'none';
            vcash_group.style.display = 'block';
            // photoInput.style.display = 'block';
        } else {
            instaLinkGroup.style.display = 'none';
            phoneInput.style.display = 'none';
            photoInput.style.display = 'none';
        }
    });
</script>

    @endsection
