@extends('client.layout')

@section('title')
danh sách
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center" style="min-height: 50vh;">
        <section class="products py-5">
            <div class="container">
                <h2 class="text-center mb-4">Danh sách sản phẩm</h2>
                <div class="row">
                    @foreach ($products as $perfume)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <a href="{{ route('client.perfumes.detail', $perfume->id) }}">
                                    <img src="{{ asset('storage') . '/' . $perfume->thumbnail }}" class="card-img-top"
                                        alt="Product 1"></a>
                                <div class="card-body">
                                    <a href="{{ route('client.perfumes.detail', $perfume->id) }}" class="text-info text-decoration-none "> 
                                        <h5 class="card-title">{{ Str::limit($perfume->title, 20,'...')  }}</h5>
                                    </a>
                                    <p class="card-text">Giá: {{ number_format($perfume->price,0,'.','.')}}VND </p>
                                    <a href="{{ route('client.perfumes.detail', $perfume->id) }}" class="btn btn-primary">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 2</h5>
                        <p class="card-text">$150.00</p>
                        <a href="#" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 3</h5>
                        <p class="card-text">$200.00</p>
                        <a href="#" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Sản phẩm 4</h5>
                        <p class="card-text">$250.00</p>
                        <a href="#" class="btn btn-primary">Mua ngay</a>
                    </div>
                </div>
            </div> --}}
                </div>
                {{$products->links()}}
            </div>
        </section>
    </div>
</div>
@endsection