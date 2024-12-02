<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    //
    public function detail(Perfume $Perfume)
    {
        $cate = Category::all();

        return view('admin.perfumes.detail', compact('Perfume', 'cate'));
    }
    public function index(Request $request)
    {
        $query = $request->input("query");
        if ($query) {
            $perfumes = Perfume::where("title", "like", "%" . $query . "%")->OrderByDesc('id')->paginate(5);
        } else {
            $perfumes = Perfume::OrderByDesc('id')->paginate(6);
        }
        return view("admin.perfumes.index", compact('query',"perfumes"));
    }
    public function create()
    {
        $cate = Category::all();

        return view("admin.perfumes.create", compact("cate"));
    }
    public function store(Request $request, Perfume $Perfume)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'thumbnail' => ['required', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'description' => ['required', 'min:1'],
            'origin' => ['required', 'min:1'],
            'style' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'release_date' => ['required'],
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
        Perfume::query()->create($data);
        return redirect()->route('admin.perfumes.index')->with('message', 'Đăng ký thành công');
    }
    public function edit(Perfume $Perfume)
    {
        $cate = Category::all();

        return view('admin.perfumes.edit', compact('Perfume', 'cate'));
    }
    public function update(Request $request, Perfume $Perfume)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3'],
            'thumbnail' => ['mimes:jpeg,png,jpg,gif', 'max:2048'],
            'description' => ['required', 'min:1'],
            'origin' => ['required', 'min:3'],
            'style' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'release_date' => ['required'],
            'Category_id' => ['required'],
        ]);
        $data = $request->except('thumbnail');
        $thumbnail_old = $Perfume->thumbnail;
        $data['thumbnail'] = $thumbnail_old;
        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('thumbnail')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_thumbnails = $request->file('thumbnail')->store('thumbnails');
            $data['thumbnail'] = $files_thumbnails;
            // $data['image'] = $request->file('image')->store('products', 'public');
        }

        $Perfume->update($data);
        return redirect()->route('admin.perfumes.index')->with('message', 'Cập nhập thành công');
    }
    public function destroy(Perfume $Perfume)
    {
        $Perfume->delete();
        return redirect()->back()->with("messagee", "Xóa thành công");
    }
}
