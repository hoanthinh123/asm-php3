<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $categories = Category::where('name','like','%'. $query .'%')->paginate(5);
        }else{
        $categories = Category::OrderByDesc('id')->paginate(10);
        }
        return view("admin.categories.index", compact('query',"categories"));
    }
    public function create(){
        return view("admin.categories.create");
    }
    public function store(Request $request, Category $category){
        $data = $request->validate([
            "name"=> ["required","min:3"],
        ]);

        Category::create($data);
        return redirect()->route("admin.categories.index")->with("message","Thêm mới thành công");
    }
    public function edit(Category $category){
        return view("admin.categories.edit", compact("category"));
    }
    public function update(Request $request, Category $category){
        $data = $request->validate([
            "name"=> ["required",'min:3'],
        ]);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('message','');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->back()->with("messagee","Xóa thành công");
    }
}
