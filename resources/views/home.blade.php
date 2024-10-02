@extends('layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <section class="banner bg-success text-white text-center py-5">
        <div class="container">
            <h2>Giảm giá tới 50% cho tất cả các sản phẩm!</h2>
            <p>Ưu đãi có hạn - Nhanh tay mua sắm ngay hôm nay!</p>
            <a href="#" class="btn btn-light btn-lg">Mua ngay</a>
        </div>
    </section>

    <!-- Sản phẩm nổi bật -->
    <section class="products py-5">
        <style>
            .a {
                text-decoration: none;
                font-weight: bold;
                font-size: 25px;
            }

            .a:hover {
                color: red;
            }

            .a span {
                font-size: 20px;
            }
        </style>
        <div class="container">
            <h2 class="text-center mb-4">8 Sản phẩm nổi bật mới nhất</h2>
            <div class="row">
                @foreach ($bookdesc as $book)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <a href="{{ route('page.detail', $book->id) }}" class="a">
                                <img src="{{ $book->thumbnail }}" class="card-img-top" alt="Product 1">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('page.detail', $book->id) }}" class="a">
                                    <div class="card-title " style="font-size: 18px">{{ $book->title }}</div>
                                </a>
                                <p class="card-text">Giá: ${{ $book->Price }}</p>
                                <a href="#" class="btn btn-primary">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h2 class="text-center mb-4">Sản phẩm</h2>
            <div class="row">
                @foreach ($books as $bookc)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <a href="{{ route('page.detail', $bookc->id) }}" class="a">
                                <img src="{{ $bookc->thumbnail }}" class="card-img-top" alt="Product 1">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('page.detail', $bookc->id) }}" class="a">
                                    <div class="card-title " style="font-size: 18px">{{ $bookc->title }}</div>
                                </a>
                                <p class="card-text">Giá: ${{ $bookc->Price }}</p>
                                <a href="#" class="btn btn-primary">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
