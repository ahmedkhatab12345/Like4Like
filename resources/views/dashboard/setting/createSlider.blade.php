@extends('layouts.dashboard.app')
@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">اضافه سليدر جديد</h3>
                </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sliders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="photo" class="form-label text-primary">الصورة</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo" required>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">اضف سليدر </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
