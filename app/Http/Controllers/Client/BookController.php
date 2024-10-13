<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function listProduct(Request $request){
        $query = $request->input('query');
        if ($query) {
            $products = Book::where('title',"like", "%" . $query . "%")->paginate(5);
        }else{
            $products = Book::OrderByDesc('id')->paginate(8);

        }
        $list = DB::table('categories')
            ->get();
        return view('client.product',compact('query','products','list'));
    }
    public function chitiet()
    {
        $list = DB::table('categories')
            ->get();
        return view('client.chitiet',compact('list'));
    }
    public function home()
    {
        $bookdesc = Book::orderBy('id', 'desc')->limit(4)->get();
        // 8 sản phẩm có giá cao nhất 
        // $bookdesc = DB::table('books')
        //     ->orderByDesc('Price')
        //     ->limit(8)
        //     ->get();
        // 8 sản phẩm có giá thấp nhất
        // $books =  DB::table('books')
        //     ->inRandomOrder('Price')
        //     ->limit(4)
        //     ->get();
        $list = DB::table('categories')
            ->get();
        // hiển thị ra view
        return view('client.home', compact('bookdesc', 'list'));
    }
    public function list($id)
    {
        $listbooks = DB::table('books')
            ->where('Category_id', $id)
            ->paginate(8);
        $list = DB::table('categories')
            ->get();

        return view('client.list-product', compact('listbooks', 'list'));
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
        $relatedBooks = Book::where('Category_id', $detailOne->Category_id)
            ->where('id', '!=', $detailOne->id)
            ->limit(4)
            ->get();
        return view('client.detail', compact('detailOne', 'list', 'relatedBooks'));
    }
}
