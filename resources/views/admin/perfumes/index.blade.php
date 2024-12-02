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
        <a href="{{ route('admin.perfumes.create') }}" class="btn btn-primary" style="width: 100px; text-align: center">Add New</a>
        <hr>
        <!-- Form tìm kiếm -->
        <form action="{{ route('admin.perfumes.index') }}" method="GET" style=" display: flex; gap: 15px">

            <div class="col-auto">
                <input type="text" name="query" class="form-control" style="width: 500px;"
                    placeholder="Tìm kiếm product..." required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Tìm</button>
                <a href="{{ route('admin.perfumes.index') }}" name="comeBack" class="btn btn-success">DANH SÁCH</a>
            </div>
        </form><br>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>title</th>
                    <th>thumbnail</th>
                    <th>description</th>
                    <th>origin</th>
                    <th>style</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>release_date</th>
                    <th>Category_id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perfumes as $Perfume)
                    <tr>
                        <td>{{ $Perfume->id }}</td>
                        <td>{{Str::limit($Perfume->title,20,'...')  }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $Perfume->thumbnail }}" width="90" alt="">
                        </td>
                        <td>{{ Str::limit($Perfume->description,20,'...')  }}</td>
                        <td>{{ Str::limit($Perfume->origin,20,'...') }}</td>
                        <td>{{ $Perfume->style}}</td>
                        <td>{{ number_format($Perfume->price, '0', ',', '.') }}₫</td>

                        <td>{{ $Perfume->quantity }}</td>
                        <td>{{ date('d/m/Y', strtotime($Perfume->release_date)) }}</td>
                        <td>{{ $Perfume->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.perfumes.detail', $Perfume) }}" class="btn btn-success">Show</a>
                                <a href="{{ route('admin.perfumes.edit', $Perfume) }}" style="display: inline-block"
                                    class="btn btn-primary mx-1 col-auto">Edit</a>
                                <form action="{{ route('admin.perfumes.destroy', $Perfume) }}" class="col-auto" method="post" style="display: inline-block">
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
        {{ $perfumes->links() }}
    </div>
@endsection
