@extends('admin.layout')
@section('title')
    Cập nhập
@endsection
@section('content')
<div class="card-body">
    <h1 class="text-center">Cập nhập Product</h1>

    <form action="{{ route('admin.perfumes.update',$Perfume )}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Full Name -->
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" id="" class="form-control" value="{{$Perfume->title}}" placeholder="Enter your title">
        </div>
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- thumbnail -->
         <div class="mb-3">
            <label for="thumbnail" class="form-label">thumbnail</label>
            <input type="file" name="thumbnail" class="form-control" 
                placeholder="Enter your thumbnail">
            <img src="{{ asset('storage') . '/' . $Perfume->thumbnail }}" width="60" alt="{{$Perfume->title}}">
        </div>
        @error('thumbnail')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- description -->
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea type="text" name="description" class="form-control" id="description" value=""
                placeholder="Enter your description">{{$Perfume->description}}</textarea>
        </div>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- origin -->
        <div class="mb-3">
            <label for="origin" class="form-label">origin</label>
            <input type="text" name="origin" class="form-control" id="origin" value="{{$Perfume->origin}}"
                placeholder="Enter your origin">
        </div>
        @error('origin')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- style -->
         <div class="mb-3">
            <label for="style" class="form-label">style</label>
            <input type="text" name="style" class="form-control" id="style" value="{{$Perfume->style}}"
                placeholder="Enter your style">
        </div>
        <!-- release_date -->
        <div class="mb-3">
            <label for="release_date" class="form-label">release_date</label>
            <input type="date" name="release_date" class="form-control w-25" id="release_date" value="{{$Perfume->release_date}}"
                placeholder="Enter your release_date">
        </div>
        @error('style')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <!-- price -->
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{$Perfume->price}}"
                placeholder="Enter your price">
        </div>
        @error('price')
            <span class="text-danger">{{ $message }}</span>
        @enderror
         <!-- quantity -->
         <div class="mb-3">
            <label for="quantity" class="form-label">quantity</label>
            <input type="number" name="quantity" class="form-control" id="quantity" value="{{$Perfume->quantity}}"
                placeholder="Enter your quantity">
        </div>
        @error('quantity')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="Category_id" class="form-label">Category Name</label>
            <select class="form-select w-25" name="Category_id" id="Category_id" name="Category_id" >
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
            <button type="submit" class="btn btn-primary">Update Products</button>
        </div>
    </form>
</div>
@endsection