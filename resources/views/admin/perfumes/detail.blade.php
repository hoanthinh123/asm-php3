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
            <input type="text" name="title" id="" class="form-control" value="{{$Perfume->title}}" disabled placeholder="Enter your title">
        </div>
        
         <!-- thumbnail -->
         <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail:</label>
            <img src="{{ asset('storage') . '/' . $Perfume->thumbnail }}" width="120"  alt="{{$Perfume->title}}">
        </div>

        <!-- description -->
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea type="text" name="description" class="form-control" id="description" disabled >{{$Perfume->description}}</textarea>
        </div>
       
        <!-- origin -->
        <div class="mb-3">
            <label for="origin" class="form-label">origin</label>
            <input type="text" name="origin" class="form-control" id="origin" disabled value="{{$Perfume->origin}}"
                placeholder="Enter your origin">
        </div>
        <!-- style -->
        <div class="mb-3">
            <label for="style" class="form-label">style</label>
            <input type="text" name="style" class="form-control" id="style" disabled value="{{$Perfume->style}}"
                placeholder="Enter your style">
        </div>
       
       
        <!-- price -->
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" name="price" class="form-control" id="price" disabled value="{{$Perfume->price}}"
                placeholder="Enter your price">
        </div>
      
         <!-- quantity -->
         <div class="mb-3">
            <label for="quantity" class="form-label">quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" disabled value="{{$Perfume->quantity}}"
                placeholder="Enter your quantity">
        </div>
        <!-- release_date -->
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date</label>
            <input type="date" name="release_date" class="form-control w-25" disabled id="release_date" value="{{$Perfume->release_date}}"
                placeholder="Enter your release_date">
        </div>
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category Name</label>
            <select class="form-select w-25" name="Category_id" id="Category_id" disabled name="Category_id"  >
                @foreach ($cate as $cates)
                        <option value="{{ $cates->id }}" @if ($cates->id == $Perfume->Category_id) selected @endif>
                            {{ $cates->name }}
                        </option>
                    @endforeach
                </select>
            </select>
        </div>
        <!-- Submit Button -->
        <div class="d-grid">
           <a href="{{route('admin.perfumes.index')}}" class="btn btn-success w-25">Trở về</a>
        </div>
    </form>
</div>
@endsection