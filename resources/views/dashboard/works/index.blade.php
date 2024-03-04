@extends('layouts.dashboard.app')
@section('content') 
<div class="container">
        <h1>جميع الاعمال </h1>
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الوصف</th>
                    <th scope="col">الصوره</th>
                    <th scope="col">الرابط</th>
                    <th scope="col">العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($works as $work)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Str::limit($work->description, 100) }}</td>
                        <td><img  style="width: 90px; height: 90px;" src="{{asset('images/dashboard/works/'.$work->photo)}}"></td>
                        <td>{{$work->link}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('works.edit', $work->id) }}" class="btn btn-outline-primary box-shadow-3">تعديل</a>
                                <form action="{{ route('works.destroy', $work->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger box-shadow-3">حذف</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection