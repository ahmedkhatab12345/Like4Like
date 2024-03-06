@extends('layouts.site.app')
@section('content')
    <div class="MyContainer" style="width: 100%; margin: auto;margin-top: 10px;">
        <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom:70px;">
        <form action="{{ route('storeSubscription') }}" method="POST" class="form-control shadow w-50 m-auto" enctype="multipart/form-data">
            @csrf
            <div class="mx-3 py-3">

                <h1 class="h4 my-3">قيمة الاشتراك : 1500</h1>
                <select name="payment_method" id="payment_method" class="form-select w-75">
                    <option value="">اختر طريقة الدفع</option>
                    <option value="vcash">فودافون كاش</option>
                    <option value="ipa">انستا باي</option>
                </select>
                <br>
                <div id="insta_link_group" style="display: none;">
                    <p>إيبسوم، أو ليبسوم كما يعرف أحياناً</p>
                    <p style="display: none;" id="labeli">رابط انستا باي</p>
                    <p style="display: none;" id="labelv">رقم الهاتف</p>
                    <input type="text" name="phone_number"  class="form-control w-75">
                    <div id="imageBox" class="my-3">
                        <input type="file" class="text-center" id="imageInput" name="photo" accept="image/*">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">اشتراك</button>
            </div>
        </form>

    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            var instaLinkGroup = document.getElementById('insta_link_group');
            var labelv = document.getElementById('labelv');
            var labeli = document.getElementById('labeli');

            if (this.value === 'ipa') {
                instaLinkGroup.style.display = 'block';
                labeli.style.display = 'block';
                labelv.style.display = 'none';
            } else if (this.value === 'vcash') {
                instaLinkGroup.style.display = 'block';
                labelv.style.display = 'block';
                labeli.style.display = 'none';
            } else {
                instaLinkGroup.style.display = 'none';
                labelv.style.display = 'none';
                labeli.style.display = 'none';
            }
        });
    </script>

@endsection
