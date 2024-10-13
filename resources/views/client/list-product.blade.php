@extends('client.layout')
@section('title')
    Sản phẩm
@endsection
@section('content')
    <br>
    <div class="container">
        <h2 class="text-center mb-4">Sản phẩm theo loại</h2>
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
        <div class="row">
            <!-- Sản phẩm 1 -->
            @foreach ($listbooks as $book)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <a href="{{route('client.books.detail',$book->id)}}" class="a">

                            <img src="{{ asset('storage').'/'. $book->thumbnail }}" class="card-img-top" alt="Sản phẩm 1">
                        </a>
                        <div class="card-body">
                            <a href="{{route('client.books.detail',$book->id)}}" class="a">
                                <h5 class="card-title" style="font-size: 18px">{{ Str::limit($book->title, 20,'...')  }}</h5>
                            </a>
                            <p class="card-text">Giá: {{ number_format($book->Price,0,'.','.')  }}VND</p>
                            <a href="{{route('client.books.detail',$book->id)}}" class="btn btn-primary">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{$listbooks->links()}}
        </div>
    </div>
@endsection