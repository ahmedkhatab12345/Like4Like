@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
    <h1>جميع السلايدر</h1>
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('sliders.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة سلايدر </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الصورة</th>
                        <th scope="col">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img style="width: 266px; height: 220px;" src="{{asset('images/dashboard/sliders/'.$slider->photo)}}" alt="Slider Image"></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-outline-primary">تعديل</a>
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
