@extends('client.layout')
@section('title')
    Chi tiết
@endsection
@section('content')
    <div class="container">
        <br>
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-5">Tên Sách: <span>{{ $detailOne->title }}</span></h1>
                <p class="text-muted">Mã sản phẩm: {{ $detailOne->id }} </p>
            </div>
        </div>

        <!-- Nội dung sản phẩm -->
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6">
                <img src="{{ asset('storage') . '/' . $detailOne->thumbnail }}" alt="Hình ảnh sản phẩm" class="img-fluid">
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h3 class="text-primary">Giá: {{ number_format($detailOne->price, 0, '.', '.') }} VND</h3>
                <p>Mô tả ngắn về sản phẩm. Đây là nơi bạn có thể giới thiệu sản phẩm của mình một cách chi tiết, cung cấp
                    các thông tin cần thiết.</p>

                <!-- Các nút hành động -->
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg">Mua ngay</button>
                    <button class="btn btn-outline-secondary btn-lg">Thêm vào giỏ hàng</button>
                </div>

                <!-- Thông tin thêm -->
                <ul class="list-unstyled">
                    <li><strong>Tình trạng:</strong> Còn hàng</li>
                    <li><strong>Loại nước hoa:</strong> {{ $detailOne->category_name }} </li>
                    <li><strong>Xuất xứ :</strong> {{ $detailOne->origin }} </li>
                    <li><strong>Phong cách :</strong> {{ $detailOne->style }} </li>
                    <li><strong>Số lượng :</strong> {{ $detailOne->quantity }} </li>
                    <li><strong>Năm sản xuất :</strong> {{ $detailOne->release_date }} </li>

                </ul>
            </div>
        </div><br>
        <a href="{{ route('client.home') }}" class="btn btn-success btn-lg">
            < Quay lại</a>
                <!-- Phần mô tả chi tiết hơn -->
                <div class="row mt-5">
                    <div class="col-12">
                        <h4>Mô tả chi tiết</h4>
                        <p>{{ $detailOne->description }}</p>
                    </div>
                </div>
                <hr>
                <!-- Sản phẩm cùng loại -->
                <div class="row mt-5">
                    <h2 class="text-center mb-4">Sản Phẩm cùng loại</h2>
                    <div class="row">
                        @foreach ($relatedPerfumes as $perfume)
                            <div class="col-md-3 mb-4">
                                <div class="card">
                                    <a href="{{ route('client.perfumes.detail', $perfume) }}">
                                        <img src="{{ asset('storage') . '/' . $perfume->thumbnail }}"
                                            class="card-img-top" alt="Product 1"></a>
                                    <div class="card-body">
                                        <a href="{{route('client.perfumes.detail',$perfume->id)}}" class="text-danger text-decoration-none">
                                        <h5 class="card-title">{{ $perfume->title }}</h5></a>
                                        <p class="card-text">Giá: {{ number_format($perfume->price,0,'.','.')  }}VND</p>
                                        <a href="{{ route('client.perfumes.detail', $perfume->id) }}"
                                            class="btn btn-primary">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    </div>
@endsection
