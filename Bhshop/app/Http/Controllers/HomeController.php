<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Products;
class HomeController extends Controller
{
    public function index()
    {
        $bestseller = Products::BestSellerProducts();
        return view('home', ['bestseller' => $bestseller]);
     
    }
}
