@extends('admin.layout')
@section('title')
    Category
@endsection
@section('content')
    <div class="w-full">
        <h1 class="alert alert-secondary">Category</h1>
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
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="width: 100px; text-align: center">Add
            New</a>
        <hr>
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.categories.index') }}" method="GET" style=" display: flex; gap: 15px">
            <div class="col-auto">
                <input type="text" name="query" class="form-control" style="width: 500px;"
                    placeholder="Tìm kiếm category..." required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tìm</button>
                <a href="{{ route('admin.categories.index') }}" name="comeBack" class="btn btn-success">DANH SÁCH</a>
            </div>
        </form><br>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary mx-1 d-inline-block"
                                >Edit</a>

                            <form action="{{ route('admin.categories.destroy', $category) }}" class="d-inline-block"
                                method="post">
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
        {{ $categories->links() }}
    </div>
@endsection
