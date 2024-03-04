@extends('layouts.dashboard.app')
@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">اضافه مشرف جديد</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">الاسم</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ادخل الاسم" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-primary">البريد الاكتروني</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="ادخل البريد الاكتروني" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label text-primary">الرقم السري</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="الرقم السري" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label text-primary">تأكيد الرقم السري</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="تأكيد الرقم السري" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label text-primary">الصوره</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">اضافه</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

