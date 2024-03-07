{{-- @extends('layouts.site.app')

@section('content')
<div class="MyContainer" style="width: 100%; margin: auto; margin-top: 20px;">
    <div class="cards m-auto gap-4 row" style="align-items: center; justify-content: center; padding-left: 40px;">
        @foreach($works as $work)
        <div class="card col-lg-5 col-md-6 col-12" style="width: 20rem; padding: 10px; border: 1px solid #000000 !important; box-shadow: 0px 0px 10px 0px #0000000D !important;">
            <img src="{{url('/')}}/website/assets/work/youtube.jfif" class="card-img-top" style="height: 300px;" alt="card image">
            <div class="card-body">
                <p class="card-text">برجاء الدخول على الرابط وعمل لايك على الفيديو، ثم قم بحفظ صورة الشاشة باللايك وإرسالها.</p>
                <div class="d-flex flex-column align-items-center" id="app">
                    <a href="{{$work->link}}" class="btn btn-primary" style="background-color: #0038FF; outline: none; border: none;">تنفيذ المهمة</a>
                    <a href="#" class="btn btn-primary" style="background-color: #0038FF; outline: none; border: none;">اكمال المهمة</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}


@extends('layouts.site.app')

@section('content')
<p>hhhhhhhhhhhhhh</p>
<div class="container" >
    <div class="  my-5   row" >
        @foreach($works as $work)
        <div class=" my-3   col-md-6 col-12" >
            <form action="{{ route('youtStore') }}" method="POST" class="mb-3" enctype="multipart/form-data">
                @csrf
            <div class="w-100 form p-3 px-4 shadow  mx-auto">
                <img src="{{url('/')}}/website/assets/work/youtube.jfif" class="card-img-top" style="height: 300px;" alt="card image">
            <div class=" my-3">
                <a href="{{$work->link}}"  target="_blank" class="btn btn-primary">اضغط علي الرابط
                </a>
                <label for="photo" class="my-2" style="font-size: 20px; font-weight: 500">برجاء الدخول على الرابط وعمل لايك على الفيديو، ثم قم بحفظ صورة الشاشة باللايك وإرسالها.</label>
                <input type="file" class="form-control w-75 " style="font-size: 16px; font-weight: 500" name="photo" >
                @error('photo')
                <div class="w-75 alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

                <div class="my-2 d-flex justify-content-end" id="app">
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-success">تنفيذ المهمة</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection
