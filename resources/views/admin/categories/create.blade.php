@extends('admin.layout')
@section('title')
    Thêm mới
@endsection
@section('content')
    <div class="card-body">
        <h1 class="text-center">Thêm mới Category</h1>

        <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- ID -->
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" name="id" id="" class="form-control" placeholder="Tăng dần!!" disabled>
            </div>

            <!-- name -->
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name">
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add new</button>
            </div>
        </form>
    </div>
@endsection
