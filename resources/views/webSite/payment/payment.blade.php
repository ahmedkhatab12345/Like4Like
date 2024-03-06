@extends('layouts.site.app')

@section('content')

    <div class="MyContainer" style="width: 100%; margin: auto; margin-top: 10px;">
        <img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom: 70px;">
        <div class="mx-3 py-3">
            

            <form action="{{ route('storeSubscription') }}" method="POST" class="form-control shadow w-50 m-auto" enctype="multipart/form-data">
                @csrf
                <div class="subscription-info" style="text-align: center;margin-top: 30px;">
                    <h1 class="subscription-heading" style="color: red;font-size: 24px;font-weight: bold;margin-bottom: 10px;">للاشتراك في الباقة السنوية</h1>
                    <p class="subscription-text" style="font-size: 18px;">
                        يُرجى تحويل مبلغ <span class="amount" style="color: blue;font-weight: bold;">1500 جنيه</span> على الرقم التالي: <span class="phone-number" style="color: blue;font-weight: bold;">01000000000</span>،
                        عبر وسائل الدفع التالية واتباع الخطوات اللازمة:
                        <br>
                        - فودافون كاش.
                        <br>
                        - انستاباي.
                    </p>
                </div>

                <div class="mx-3 py-3">
                    <select name="payment_method" id="payment_method" class="form-select w-75">
                        <option value="">اختر طريقة الدفع</option>
                        <option value="vcash">فودافون كاش</option>
                        <option value="ipa">انستا باي</option>
                    </select>
                    <br>

                    <div id="insta_link_group" style="display: none;">
                        <p style="display: none;" id="labeli">رابط انستا باي</p>
                        <p style="display: none;" id="labelv"> رقم الهاتف المحول منه</p>
                        <input type="text" name="phone_number" class="form-control w-75" placeholder="رقم الهاتف">
                        <div id="imageBox" class="my-3">
                            <p > صوره اثبات الدفع  </p>
                            <input type="file" class="form-control" id="imageInput" name="photo" accept="image/*">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">اشتراك</button>
                </div>
            </form>
        </div>
    </div>

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
