<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Products;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        
        if (!$productId || !is_numeric($productId)) {
            return redirect()->route('giohang')->with('error', 'ID sản phẩm không hợp lệ.');
        }

        $product = Products::find($productId);

        if (!$product) {
            return redirect()->route('cart')->with('error', 'Sản phẩm không tồn tại.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "img" => $product->img
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $total = 0;
    
        foreach ($cart as $item) {
            $quantity = isset($item['quantity']) ? $item['quantity'] : 1; 
            $total += $item['price'] * $quantity;
        }
    
        return view('cart', compact('cart', 'total'));
    }
    
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]); 
            session()->put('cart', $cart); 
        }
        return redirect()->route('cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function updateCart(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');

    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] = $quantity;
        $cart[$productId]['total'] = ceil($quantity * $cart[$productId]['price']); // Làm tròn lên
    }
    session()->put('cart', $cart);
    return response()->json(['success' => true]);
}
    public function showCheckoutForm()
    {
        $cart = session('cart', []);
        $total = array_sum(array_map(function($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        return view('checkout', compact('cart', 'total'));
    }

    public function processCheckout(Request $request)
    {
        

        try {
            $trackingNumber = strtoupper(uniqid('TRACK'));
            session(['tracking_number' => $trackingNumber]);
            return redirect()->route('success');
        } catch (Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function checkout(Request $request)
    {
        Session::forget('cart');
        $trackingNumber = strtoupper(Str::random());
        session(['tracking_number' => $trackingNumber]);
        return redirect()->route('success', ['tracking_number' => $trackingNumber]);
    }


    public function success()
    {
        $trackingNumber = session('tracking_number');
        return view('success', ['trackingNumber' => $trackingNumber]);
    }
}
