@extends('layouts.dashboard.app')
@section('content') 
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">تعديل عمل</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <script>
                            toastr.success('{{ session('success') }}');
                        </script>
                    @endif
                    <form method="POST" action="{{ route('works.update', $works->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="description" class="form-label text-primary">الوصف</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"  rows="4" required>{{ $works->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="link" class="form-label text-primary">الرابط</label>
                                <div class="input-group ">
                                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="link"  value="{{ $works->link }}" required>
                                </div>
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                <label for="photo" class="form-label text-primary">Photo</label>
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-4">
                                @if($works->photo)
                                    <img src="{{ asset('images/dashboard/works/'.$works->photo) }}" alt="صورة العمل القديمة" width="230" height="150">
                                @endif
                            </div>

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">حفظ التغييرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection