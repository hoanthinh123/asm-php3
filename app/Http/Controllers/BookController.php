<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function home()
    {
        // 8 sản phẩm có giá cao nhất 
        $bookdesc = DB::table('books')
            ->orderByDesc('Price')
            ->limit(8)
            ->get();
        // 8 sản phẩm có giá thấp nhất
        $books =  DB::table('books')
            ->inRandomOrder('Price')
            ->limit(4)
            ->get();
        $list = DB::table('categories')
            ->get();
        // hiển thị ra view
        return view('home', compact('bookdesc', 'books', 'list'));
    }
    public function list($id)
    {
        $listbooks = DB::table('books')
            ->where('Category_id', $id)
            ->paginate(8);
        $list = DB::table('categories')
            ->get();
        
        return view('list-product', compact('listbooks','list'));
    }
    public function detail($id)
    {
        $detailOne = DB::table('books')
            ->join('categories', 'books.Category_id', '=', 'categories.id')
            ->select('books.*', 'categories.name as category_name')
            ->where('books.id', $id)
            ->first();
        $list = DB::table('categories')
            ->get();
        return view('detail', compact('detailOne','list'));
    }
}
