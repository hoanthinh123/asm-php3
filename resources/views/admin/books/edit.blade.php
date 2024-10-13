@extends('admin.layout')
@section('title')
    Cập nhập
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Cập nhập Book</h1>

    <form action="{{ route('admin.books.update',$book)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Full Name -->
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="" class="form-control" value="{{$book->title}}" placeholder="Enter your title">
        </div>
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- thumbnail -->
         <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" 
                placeholder="Enter your thumbnail">
            <img src="{{ asset('storage') . '/' . $book->thumbnail }}" width="60" alt="{{$book->title}}">
        </div>
        @error('thumbnail')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- author -->
        <div class="mb-3">
            <label for="author" class="form-label">author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{$book->author}}"
                placeholder="Enter your author">
        </div>
        @error('author')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- publisher -->
        <div class="mb-3">
            <label for="publisher" class="form-label">publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher" value="{{$book->publisher}}"
                placeholder="Enter your publisher">
        </div>
        @error('publisher')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Publication -->
        <div class="mb-3">
            <label for="Publication" class="form-label">Publication</label>
            <input type="date" name="Publication" class="form-control w-25" id="Publication" value="{{$book->Publication}}"
                placeholder="Enter your Publication">
        </div>
        @error('Publication')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- Price -->
        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="number" name="Price" class="form-control" id="Price" value="{{$book->Price}}"
                placeholder="Enter your Price">
        </div>
        @error('Price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- Quantity -->
         <div class="mb-3">
            <label for="Quantity" class="form-label">Quantity</label>
            <input type="number" name="Quantity" class="form-control" id="Quantity" value="{{$book->Quantity}}"
                placeholder="Enter your Quantity">
        </div>
        @error('Quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category Name</label>
            <select class="form-select w-25" name="Category_id" id="Category_id" name="Category_id" >
                @foreach ($cate as $cates)
                        <option value="{{ $cates->id }}" @if ($cates->id == $book->Category_id) selected @endif>
                            {{ $cates->name }}
                        </option>
                    @endforeach
                </select>
            </select>
        </div>
        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Update Products</button>
        </div>
    </form>
</div>
@endsection