<!-- start Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white position-fixed w-100 top-0" style="z-index: 100;box-shadow: 0px 4px 8px 0px #ABBED166; ">
    <div class="container">
      <a class="navbar-brand fs-1" href="#"><span style="color: blue">like</span><span
          style="color: red">4like</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex gap-4" style="margin-right:50px ;">
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" style="color: red" href="{{route('website.index')}}">بيان العمل</a>
          </li>
          <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5" style="color: rgb(209, 209, 209); cursor: auto" aria-current="page"
              href="#">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('subscription')}}">الاشتراك في الباقه</a>
          </li>
          <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5 ms-2 me-2" style="color: rgb(209, 209, 209); cursor: auto"
              aria-current="page" href="#">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('withdrawal.index')}}">سحب الارباح</a>
          </li>
          <li class="nav-item d-lg-block d-none">
            <a class="nav-link active fs-5 ms-2 me-2" style="color: rgb(209, 209, 209); cursor: auto"
              aria-current="page" href="#">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active fs-5" aria-current="page" href="{{route('help')}}">المساعده</a>
          </li>
        </ul>

        <div class="part-img">
          <img src="{{url('/')}}/website/assets/user3.jpg" style="width: 36px; height: 36px; border-radius: 50%" alt="" />
        </div>
      </div>
    </div>
  </nav>
  <!-- End Header -->
