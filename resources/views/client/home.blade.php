@extends('client.layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <div class="container">
        <style>
            /* Đặt chiều cao của slideshow */
            .carousel-item {
                height: 500px;
            }
            /* Đảm bảo hình ảnh vừa khít với slideshow và giữ tỷ lệ */
            .carousel-item img {
                height: 100%;
                width: 100%;
                object-fit: cover; /* Giữ tỷ lệ hình ảnh và cắt nếu cần */
            }
        </style>
        <section class="h-100">
            <div id="carouselExample" class="carousel slide mt-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('storage/banner/bann.jpg') }}" class="d-block w-100" alt="Banner 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Chào mừng đến với cửa hàng của chúng tôi!</h5>
                            <p>Khám phá những sản phẩm mới nhất và ưu đãi hấp dẫn.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/banner/banner22.jpg') }}" class="d-block w-100" alt="Banner 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ưu đãi đặc biệt chỉ hôm nay!</h5>
                            <p>Giảm giá lên đến 50% cho sản phẩm chọn lọc.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('storage/banner/bbbb.jpg') }}" class="d-block w-100" alt="Banner 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Mua sắm ngay để nhận quà tặng!</h5>
                            <p>Cơ hội nhận quà miễn phí khi mua hàng trên 1 triệu đồng.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Trở lại</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Tiếp theo</span>
                </button>
            </div>
        </section>
        <div class="row justify-content-center" style="min-height: 50vh;">
            <section class="products py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Top 4 sản phẩm mới nhất</h2>
                    <div class="row">
                        @foreach ($bookdesc as $book)
                            <div class="col-md-3 mb-4">
                                <div class="card">
                                    <a href="{{ route('client.books.detail', $book->id) }}">
                                        <img src="{{ asset('storage') . '/' . $book->thumbnail }}" class="card-img-top"
                                            alt="Product 1"></a>
                                    <div class="card-body">
                                        <a href="{{ route('client.books.detail', $book->id) }}"
                                            class="text-info text-decoration-none ">
                                            <h5 class="card-title">{{ Str::limit($book->title, 20, '...') }}</h5>
                                        </a>
                                        <p class="card-text">Giá: {{ number_format($book->Price, 0, '.', '.') }}VND</p>
                                        <a href="{{ route('client.books.detail', $book->id) }}" class="btn btn-primary">Mua
                                            ngay</a>
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
                </div>
            </section>
        </div>
    </div>
@endsection
