@extends('layouts.site.app')
@section('content')

<img src="{{url('/')}}/website/assets/spash.jpg" style="width: 100%; height: 500px; margin-bottom: 70px;">
<div class="container ">
    <div class="row my-5 ">
        <div class="col-md-6 mx-auto ">
            <div class="w-50 p-2 mx-auto shadow">
                <a href="{{route('facebook')}}"  class="">
                    <img src="{{url('/')}}/website/assets/work/facebook.jfif" style="cursor: pointer" class="w-100"  alt="">
                </a>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="w-50 p-2 mx-auto shadow">
                <a href="{{route('youtube')}}"  class="w-50 mx-auto">
                    <img src="{{url('/')}}/website/assets/work/youtube.jfif" style="cursor: pointer" class="w-100" alt="">
                </a>
            </div>

        </div>
      </div>

</div>
@endsection
