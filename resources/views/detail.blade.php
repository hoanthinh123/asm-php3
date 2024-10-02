@extends('layout')
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
                <img src="{{ $detailOne->thumbnail }}" alt="Hình ảnh sản phẩm" class="img-fluid">
            </div>
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6">
                <h3 class="text-primary">Giá: {{ $detailOne->Price }} VND</h3>
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
                    <li><strong>Loại sách:</strong> {{ $detailOne->category_name }} </li>
                    <li><strong>Tác Giả :</strong> {{ $detailOne->author }} </li>
                    <li><strong>Nhà xuất bản :</strong> {{ $detailOne->publisher }} </li>
                    <li><strong>Số lượng :</strong> {{ $detailOne->Quantity }} </li>

                </ul>
            </div>
        </div><br>
        <a href="{{ route('page.home') }}" class="btn btn-success btn-lg">
            < Quay lại</a>
                <!-- Phần mô tả chi tiết hơn -->
                <div class="row mt-5">
                    <div class="col-12">
                        <h4>Mô tả chi tiết</h4>
                        <p>Đây là mô tả đầy đủ về sản phẩm, bao gồm tất cả các tính năng, chi tiết kỹ thuật và bất kỳ thông
                            tin nào khác mà khách hàng có thể cần biết.</p>
                    </div>
                </div>
    </div>
@endsection
