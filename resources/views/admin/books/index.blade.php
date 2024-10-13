@extends('admin.layout')
@section('title')
    Products
@endsection
@section('content')
    <div class="w-full ">
        <h1 class="alert alert-secondary">Products</h1>
        @if (session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif
        @if (session('messagee'))
            <div class="alert alert-danger">
                {{ session('messagee') }}
            </div>
        @endif
        <br>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary" style="width: 100px; text-align: center">Add New</a>
        <hr>
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.books.index') }}" method="GET" style=" display: flex; gap: 15px">

            <div class="col-auto">
                <input type="text" name="query" class="form-control" style="width: 500px;"
                    placeholder="Tìm kiếm product..." required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tìm</button>
                <a href="{{ route('admin.books.index') }}" name="comeBack" class="btn btn-success">DANH SÁCH</a>
            </div>
        </form><br>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>title</th>
                    <th>thumbnail</th>
                    <th>origin</th>
                    <th>publisher</th>
                    <th>Publication</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category_id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{Str::limit($book->title,20,'...')  }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $book->thumbnail }}" width="90" alt="">
                        </td>
                        <td>{{ $book->author }}</td>
                        <td>{{ Str::limit($book->publisher,20,'...') }}</td>
                        <td>{{ date('d/m/Y', strtotime($book->Publication)) }}</td>
                        <td>{{ number_format($book->Price, '0', ',', '.') }}₫</td>

                        <td>{{ $book->Quantity }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>
                            <a href="" class="btn btn-success">Show</a>
                                <a href="{{ route('admin.books.edit', $book) }}" style="display: inline-block"
                                    class="btn btn-primary mx-1 col-auto">Edit</a>
                                <form action="{{ route('admin.books.destroy', $book) }}" class="col-auto" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('bạn có muốn xóa không?')" type="submit"
                                        class="btn btn-danger">delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>
@endsection
