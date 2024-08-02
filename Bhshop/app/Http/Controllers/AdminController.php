<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
    public function adproduct()
    {
        return view('adproduct');
    }
    public function user()
    {
        return view('user');
    }
    public function update()
    {
        return view('update');
    }

    public function index(){
        return view('admin.index');
    }
    public function productlist(){
        $categories=categories::orderBy('name', 'ASC')->get();
        $products=products::orderBy('id', 'DESC')->paginate(5);
        return view('productlist',compact('categories', 'products'));
    }



    public function productadd(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'img' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('img')){
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('uploaded'), $imageName);
            $validatedData['img'] = $imageName;
        }

        $products=products::create($validatedData);

        return redirect()->route('productlist');
    }

    public function productdelete($id)
    {
        $product = products::find($id);
    
  
        if ($product->img && file_exists(public_path('uploaded/' . $product->img))) {
         
            unlink(public_path('uploaded/' . $product->img));
        }

        $product->delete();
    
        return redirect()->route('productlist');
    }

    public function productupdateform($id){
        $categories=categories::orderBy('name', 'ASC')->get();
        $products=products::orderBy('id', 'DESC')->paginate(5);
        $product=products::find($id);
        return view('adminproductupdateform',compact('categories', 'products','product'));
    }

    public function productupdate(Request $request){
        $validatedData = $request->validate([
            'name' =>'required|string|max:255',
            'price' =>'required|numeric',
            'category_id' =>'required|integer|exists:categories,id',
            'img' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'decription' =>'nullable|string',
            'quantity' => 'nullable|numeric',
        ]);

        $id=$request->id;
        $product=products::findOrFail($id);

        if($request->hasFile('img')){
            $imageName = time().'.'.$request->img->extension();  
            $request->img->move(public_path('uploaded'), $imageName);
            $validatedData['img'] = $imageName;
            // kiểm tra hình củ và xóa
            $oldImagePath = public_path('uploaded/'.$product->img);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
        }
       
        $product->update($validatedData);

        return redirect()->route('productlist');
    }

}