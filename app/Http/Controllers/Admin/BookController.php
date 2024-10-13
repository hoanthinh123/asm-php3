<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function detail(Book $book)
    {
        $cate = Category::all();

        return view('admin.books.detail', compact('book', 'cate'));
    }
    public function index(Request $request)
    {
        $query = $request->input("query");
        if ($query) {
            $books = Book::where("title", "like", "%" . $query . "%")->OrderByDesc('id')->paginate(5);
        } else {
            $books = Book::OrderByDesc('id')->paginate(6);
        }
        return view("admin.books.index", compact('query',"books"));
    }
    public function create()
    {
        $cate = Category::all();

        return view("admin.books.create", compact("cate"));
    }
    public function store(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'thumbnail' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'author' => ['required', 'min:1'],
            'publisher' => ['required', 'min:3'],
            'Publication' => ['required'],
            'Price' => ['required'],
            'Quantity' => ['required'],
            'Category_id' => ['required'],
        ]);
        $data = $request->except('thumbnail');

        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('thumbnail')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_thumbnails = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $files_thumbnails;
            // $data['image'] = $request->file('image')->store('products', 'public');
        }
        Book::query()->create($data);
        return redirect()->route('admin.books.index')->with('message', 'Đăng ký thành công');
    }
    public function edit(Book $book)
    {
        $cate = Category::all();

        return view('admin.books.edit', compact('book', 'cate'));
    }
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'thumbnail' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
            'author' => ['required', 'min:1'],
            'publisher' => ['required', 'min:3'],
            'Publication' => ['required'],
            'Price' => ['required'],
            'Quantity' => ['required'],
            'Category_id' => ['required'],
        ]);
        $data = $request->except('thumbnail');
        $thumbnail_old = $book->thumbnail;
        $data['thumbnail'] = $thumbnail_old;
        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('thumbnail')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_thumbnails = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $files_thumbnails;
            // $data['image'] = $request->file('image')->store('products', 'public');
        }

        $book->update($data);
        return redirect()->route('admin.books.index')->with('message', 'Cập nhập thành công');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with("messagee", "Xóa thành công");
    }
}
