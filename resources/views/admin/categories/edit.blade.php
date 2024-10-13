@extends('admin.layout')
@section('title')
    Cập nhập
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Cập nhập Category</h1>

    <form action="{{ route('admin.categories.update',$category)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <!-- ID -->
         <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" name="id" id="" class="form-control" value="{{$category->id}}" disabled>
        </div>

        <!-- name -->
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
       
        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update book</button>
        </div>
    </form>
</div>
@endsection