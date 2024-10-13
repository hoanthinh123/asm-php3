@extends('admin.layout')
@section('title')
Thêm mới
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Thêm mới Product</h1>

    <form action="{{ route('admin.books.store')}}" method="post" enctype="multipart/form-data">
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
        <!-- author -->
        <div class="mb-3">
            <label for="author" class="form-label">author</label>
            <input type="text" name="author" class="form-control" id="author"
                placeholder="Enter your author">
        </div>
        @error('author')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- publisher -->
        <div class="mb-3">
            <label for="publisher" class="form-label">publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher"
                placeholder="Enter your publisher">
        </div>
        @error('publisher')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        
        <!-- Price -->
        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="number" name="Price" class="form-control" id="Price"
                placeholder="Enter your Price">
        </div>
        @error('Price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- Quantity -->
         <div class="mb-3">
            <label for="Quantity" class="form-label">Quantity</label>
            <input type="number" name="Quantity" class="form-control" id="Quantity"
                placeholder="Enter your Quantity">
        </div>
        @error('Quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Publication -->
        <div class="mb-3">
            <label for="Publication" class="form-label">Publication</label>
            <input type="date" name="Publication" class="form-control w-25" id="Publication"
                placeholder="Enter your Publication">
        </div>
        @error('Publication')
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