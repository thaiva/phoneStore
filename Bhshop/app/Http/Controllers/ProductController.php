<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class ProductController extends Controller
{
    public function list()
    {
        $products = Products::paginate(3);
        $categories = Categories::AllCategories();
        return view('products', compact('products','categories'));
    }
    public function detail()
    {
        return view('detail');
    }
    
 public function getproductsByCategory(request $request){
$products = Products::where('category_id',$request->category_id)->paginate(3);
$categories = Categories::AllCategories();
return view('products', compact('products','categories'));
}
public function getdetail(request $request){
    $product_id = $request->product_id;
    $product = Products::find($product_id);
    return view('detail',compact('product'));
}
public function search(Request $request)
{
    $query = $request->input('query');
    $products = products::where('name', 'like', '%' . $query . '%')
                         ->paginate(10);
    $categories = categories::all();
    return view('products', compact('products', 'categories'));
}

}