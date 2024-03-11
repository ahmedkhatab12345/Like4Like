@extends('layouts.dashboard.app')

@section('content') 
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Edit Admin</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $users->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label text-primary">Name</label>
                                <input type="text" value="{{ $users->name }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter your name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-primary">Email address</label>
                                <input type="email" value="{{ $users->email }}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex align-items-center justify-content-between">
                                <div class="form-group mb-3">
                                    <label for="role" class="form-label text-primary">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="role" required>
                                        <option value="admin" {{ $users->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="super_admin" {{ $users->role === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Update User</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
