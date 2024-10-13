@extends('admin.layout')
@section('title')
    Cập nhập
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Cập nhập Product</h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Full Name -->
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="" class="form-control" value="{{$book->title}}" disabled placeholder="Enter your title">
        </div>
        
         <!-- thumbnail -->
         <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail:</label>
            <img src="{{ asset('storage') . '/' . $book->thumbnail }}" width="120"  alt="{{$book->title}}">
        </div>

        <!-- author -->
        <div class="mb-3">
            <label for="author" class="form-label">author</label>
            <input type="text" name="author" class="form-control" id="author" disabled  value="{{$book->author}}"
                placeholder="Enter your author">
        </div>
       
        <!-- publisher -->
        <div class="mb-3">
            <label for="publisher" class="form-label">publisher</label>
            <input type="text" name="publisher" class="form-control" id="publisher" disabled value="{{$book->publisher}}"
                placeholder="Enter your publisher">
        </div>
       
        <!-- Publication -->
        <div class="mb-3">
            <label for="Publication" class="form-label">Publication</label>
            <input type="date" name="Publication" class="form-control w-25" disabled id="Publication" value="{{$book->Publication}}"
                placeholder="Enter your Publication">
        </div>
       
        <!-- Price -->
        <div class="mb-3">
            <label for="Price" class="form-label">Price</label>
            <input type="number" name="Price" class="form-control" id="Price" disabled value="{{$book->Price}}"
                placeholder="Enter your Price">
        </div>
      
         <!-- Quantity -->
         <div class="mb-3">
            <label for="Quantity" class="form-label">Quantity</label>
            <input type="number" name="Quantity" class="form-control" id="Quantity" disabled value="{{$book->Quantity}}"
                placeholder="Enter your Quantity">
        </div>
       
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category Name</label>
            <select class="form-select w-25" name="Category_id" id="Category_id" disabled name="Category_id"  >
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
           <a href="{{route('admin.books.index')}}" class="btn btn-success w-25">Trở về</a>
        </div>
    </form>
</div>
@endsection