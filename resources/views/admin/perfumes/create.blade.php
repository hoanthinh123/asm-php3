@extends('admin.layout')
@section('title')
Thêm mới
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Thêm mới Product</h1>

    <form action="{{ route('admin.perfumes.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Full Name -->
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="" class="form-control" placeholder="Enter your title">
        </div>
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- thumbnail -->
         <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" 
                placeholder="Enter your thumbnail">
        </div>
        @error('thumbnail')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- description -->
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea type="text" name="description" class="form-control" id="description"
                placeholder="Enter your description"></textarea>
        </div>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- origin -->
        <div class="mb-3">
            <label for="origin" class="form-label">origin</label>
            <input type="text" name="origin" class="form-control" id="origin"
                placeholder="Enter your origin">
        </div>
        @error('origin')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- style -->
         <div class="mb-3">
            <label for="style" class="form-label">style</label>
            <input type="text" name="style" class="form-control" id="style"
                placeholder="Enter your style">
        </div>
        @error('style')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        
        <!-- price -->
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" name="price" class="form-control" id="price"
                placeholder="Enter your price">
        </div>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- quantity -->
         <div class="mb-3">
            <label for="quantity" class="form-label">quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity"
                placeholder="Enter your quantity">
        </div>
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- release_date -->
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date</label>
            <input type="date" name="release_date" class="form-control w-25" id="release_date"
                placeholder="Enter your release_date">
        </div>
        @error('release_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!--Category-->
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category Name</label>
            <select class="form-select w-25" name="Category_id" id="Category_id" name="Category_id" required>
                @foreach ($cate as $cates)
                        <option value="{{ $cates->id }}">
                            {{ $cates->name }}
                        </option>
                    @endforeach
                </select>
            </select>
        </div>
        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add new</button>
        </div>
    </form>
</div>
@endsection