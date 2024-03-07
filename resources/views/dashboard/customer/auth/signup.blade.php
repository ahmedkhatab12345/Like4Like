<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/normalize.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/all.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/all.min.css" />
    <link rel="stylesheet" href="{{url('/')}}/website/assets/css/bootstrap.css">
    <title>Signup Page</title>
</head>

<body>

    <!-- start Header -->
    <nav class="navbar navbar-expand-lg  navbar-light bg-white  w-100 top-0 shadow"
        >
        <div class="container d-flex justify-content-between">
            <div>
                <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
                    style="color: red">4like</span></a>
            </div>
            
            <div class="navbar" id="navbarSupportedContent" >
                <a href="{{route('Signin.customer')}}"> 
                <button type="button"  class="btn btn-danger">
                    تسجيل الدخول
                </button></a>
            </div>
        </div>
    </nav>
    <!-- End Header -->

    <!--Start Body-->
    <div class="w-100 d-flex justify-content-center align-items-center flex-column">
     
        <form method="POST" action="{{route('Signup')}}" enctype="multipart/form-data" class="py-5 my-4 text-center  rounded shadow form w-50 ">
            @csrf   
            <h1 class="h3 mb-2 "> انشاء حساب</h1> 
            <input name="name" value="{{ old('name') }}" type="text" placeholder="الاسم " class="form-control my-2 w-75 mx-auto"> 
            @error('name')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="email" value="{{ old('email') }}" type="text" placeholder="البريد الالكتروني" class="form-control my-2 w-75 mx-auto">
            @error('email')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="phone_number" value="{{ old('phone_number') }}" type="text" placeholder="رقم الهاتف" class="form-control my-2 w-75 mx-auto">
            @error('phone_number')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            <input name="password" type="password" placeholder="الرقم السري" class="form-control my-2 w-75 mx-auto">
            @error('password')
                <div class="alert alert-danger  w-75 mx-auto">{{ $message }}</div>
            @enderror
            
            <button type="submit" class="btn btn-outline-danger my-2">انشاء حساب</button>
        </form>
    </div>
    <!--End Body-->

    <!--Start Footer-->
    <footer style="background: #263238;color: white; padding: 30px; margin-top: 30px;">
        <div class="row justify-content-center w-100">
            <section style="margin-bottom:30px ;" class="col-md-4 col-12 align-self-center">
                <h1 class="navbar-brand fs-1" href="#"><span style="color: blue; font-weight: bold;">like</span><span
                        style="color: red;font-weight: bold;">4like</span></h1>
                <h4>تابعنا</h4>
                <div class="font-asm d-flex" style="margin-top: 40px">
                    <i class="fa-brands fa-twitter fa-lg " style="padding: 10px;"></i>
                    <i class="fa-brands fa-linkedin-in fa-lg ms-2" style="padding: 10px;"></i>
                    <i class="fa-brands fa-facebook fa-lg ms-2" style="padding: 10px;"></i>
                    <i class="fa-brands fa-instagram fa-lg ms-2 " style="padding: 10px;"></i>
                </div>
            </section>
            <section class="col-md-4 col-12 align-self-center">
                <h1 style="font-family: Poppins;
        font-size: 24px;
        font-weight: 600;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        ">جهات الاتصال</h1>
                <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">العنوان: 4-5 الطريق الرئيسي، دلهي</p>
                <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        "> البريد الإلكتروني : educare@gmail.com</p>
                <p style="font-family: Poppins; 
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        "> رقم الهاتف :+٩١ ٤٥٣٣٤٣٣٢٦٥</p>
            </section>
        </div>
    </footer>
    <!--End Footer-->
    <!--js files-->
    <script src="{{url('/')}}/website/assets/js/popper.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/jquery-3.7.1.min.js"></script>
    <script src="{{url('/')}}/website/assets/js/bootstrap.js"></script>
    <script src="{{url('/')}}/website/assets/js/index.js"></script>
</body>

</html>