<!--Start Footer-->
<footer style="background: #263238;color: white; padding: 30px; margin-top: 30px;">
    <div class="row justify-content-center w-100">
      <section style="margin-bottom:30px ;" class="col-md-4 col-12 align-self-center">
        <h1 class="navbar-brand fs-1" href="#"><span style="color: blue; font-weight: bold;">like</span><span
                style="color: red;font-weight: bold;">4like</span></h1>
        <h4>تابعنا</h4>
        <div class="font-asm d-flex" style="margin-top: 40px">
        <a href="{{$footerData->facebook}}"><i class="fa-brands fa-facebook fa-lg ms-2" style="padding: 10px;"></i></a>
        <a href="{{$footerData->telegram}}"><i class="fa-brands fa-telegram fa-lg ms-2" style="padding: 10px;"></i></a>
        <a href="{{$footerData->youtube}}"><i class="fa-brands fa-youtube fa-lg ms-2" style="padding: 10px;"></i></a>
            
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
        ">العنوان: {{$footerData->address}}</p>
        <p style="font-family: Poppins;
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">  البريد الإلكتروني : {{$footerData->email}}</p>
        <p style="font-family: Poppins; 
        font-size: 15px;
        font-weight: 400;
        line-height: 23px;
        letter-spacing: 0em;
        text-align: left;
        ">  رقم الهاتف : {{$footerData->phone}}</p>
      </section>
    </div>
  </footer>
  <!--End Footer-->