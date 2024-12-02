<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerfumeController extends Controller
{
    //
    public function listProduct(Request $request){
        $query = $request->input('query');
        if ($query) {
            $products = Perfume::where('title',"like", "%" . $query . "%")->paginate(5);
        }else{
            $products = Perfume::OrderByDesc('id')->paginate(8);

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
        $perfumedesc = Perfume::orderBy('id', 'desc')->limit(4)->get();
        // 8 sản phẩm có giá cao nhất 
        // $Perfumedesc = DB::table('Perfumes')
        //     ->orderByDesc('price')
        //     ->limit(8)
        //     ->get();
        // 8 sản phẩm có giá thấp nhất
        // $Perfumes =  DB::table('Perfumes')
        //     ->inRandomOrder('price')
        //     ->limit(4)
        //     ->get();
        $list = DB::table('categories')
            ->get();
        // hiển thị ra view
        return view('client.home', compact('perfumedesc', 'list'));
    }
    public function list($id)
    {
        $listPerfumes = DB::table('perfumes')
            ->where('Category_id', $id)
            ->paginate(8);
        $list = DB::table('categories')
            ->get();

        return view('client.list-product', compact('listPerfumes', 'list'));
    }
    public function detail($id)
    {
        $detailOne = DB::table('perfumes')
            ->join('categories', 'Perfumes.Category_id', '=', 'categories.id')
            ->select('Perfumes.*', 'categories.name as category_name')
            ->where('Perfumes.id', $id)
            ->first();
        $list = DB::table('categories')
            ->get();
        $relatedPerfumes = Perfume::where('Category_id', $detailOne->Category_id)
            ->where('id', '!=', $detailOne->id)
            ->limit(4)
            ->get();
        return view('client.detail', compact('detailOne', 'list', 'relatedPerfumes'));
    }
}
