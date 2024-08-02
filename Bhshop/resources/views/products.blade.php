@extends('layout')
@section('title','Products | QTShop')
@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                      
                            <input type="text" name="query" placeholder="Tìm kiếm sản phẩm" value="{{ request()->input('query') }}">
                            <button type="submit">Tìm kiếm</button>
                         </form>
                    </div>
                    
                    
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Danh Mục</h2>
                        <ul>
                        
                            @foreach ($categories as $item)
                            <li><a href="{{ route('category',$item->id)}}">{{ $item->name }}</a></li>
                            @endforeach  
                        </ul>
                    </div>
                </div>
                 <div class="col-md-9">
                
    @csrf


                 @forelse ($products as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                  
                        <div class="product-upper">
                            <img src="{{ asset ('img/'.$item->img)}}" alt="{{ $item->name }}" />
                        </div>
                        <h2><a href="{{ route('productsdetail',$item->id)}}">{{ $item->name }}</a></h2>
                        <div class="product-carousel-price">
                            <ins><p>{{ number_format($item->price, 0, ',', '.') }} VNĐ</p></ins> <del>$999.00</del>
                        </div>  
                        <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <button type="submit" class="order-button">Đặt Hàng</button>
            </form> 
                                  
                    </div>
                </div>
                @empty
            <p>Không tìm thấy sản phẩm nào.</p>
            @endforelse
            </form>
                 </div>
                       
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                            
                            </li>
                          {{ $products->links('pagination::default') }}
                            <li>
                           
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
            </div>
            
            
        </div>
    </div>

@endsection('content')