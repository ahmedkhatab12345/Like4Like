@extends('layouts.site.app')

@section('content')
<!-- 
<div class="container" >
    <div class="  my-5   row" >
        @foreach($works as $work)
        <div class=" my-3   col-md-6 col-12" >
                @csrf
            <div class="w-100 form p-3 px-4 shadow  mx-auto">
                <img src="{{url('/')}}/website/assets/work/facebook.jfif" class="my-2 " style="width: 50px;"  alt="card image">
            <div class=" my-3">
                <a href="{{$work->link}}"  target="_blank" class="btn btn-primary">اضغط علي الرابط

                </a>
                <label for="photo" class="my-2" style="font-size: 20px; font-weight: 500">برجاء الدخول على الرابط وعمل لايك على الفيديو، ثم قم بحفظ صورة الشاشة باللايك وإرسالها.</label>
                <form action="{{ route('screenshot.store') }}" method="POST" class="mb-3" enctype="multipart/form-data">
                
                <input type="file" class="form-control w-75 " style="font-size: 16px; font-weight: 500" name="photo" >
                @error('photo')
                <div class="w-75 alert alert-danger">{{ $message }}</div>
                @enderror
                </form>
            </div>
                <div class="my-2 d-flex justify-content-end" id="app">
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-success">تنفيذ المهمة
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> -->
<div class="container">
    <div class="my-5 row">
        @foreach($facebookLinks as $link)
        <div class="my-3 col-md-6 col-12">
            <form action="{{ route('executeTask', ['id' => $link->id]) }}" method="POST" class="mb-3">
                @csrf
                <div class="w-100 form p-3 px-4 shadow mx-auto">
                    <img src="{{url('/')}}/website/assets/work/facebook.jfif" class="my-2" style="width: 50px;" alt="card image">
                    <div class="my-3">
                        <a href="{{$link->url}}" target="_blank" class="btn btn-primary">اضغط على الرابط</a>
                        <label for="photo" class="my-2" style="font-size: 20px; font-weight: 500"></label>
                        <input type="file" class="form-control w-75" style="font-size: 16px; font-weight: 500" name="photo">
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
