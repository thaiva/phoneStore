@extends('layout')

@section('title', 'Cart | QTShop')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page title area -->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="#">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <div class="thubmnail-recent">
                        <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                        <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                        <div class="product-sidebar-price">
                            <ins>$700.00</ins> <del>$800.00</del>
                        </div>
                    </div>
                    <!-- Additional recent products can be added here -->
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <li><a href="#">Sony Smart TV - 2015</a></li>
                        <!-- Additional recent posts can be added here -->
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="container_cart">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <h1 id="order_review_heading">Giỏ Hàng</h1>

                    @if(count($cart) > 0)
                    @foreach($cart as $id => $details)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên</th>
                                <th>giá</th>
                                <th>Số lượng</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ number_format($details['price'], 3, ',', '.') }} VNĐ</td>
                                <td>
                                    <div class="quantity">
                                        <button class="decrease-btn" data-product-id="{{ $id }}">-</button>
                                        <span class="quantity-value">{{ $details['quantity'] }}</span>
                                        <button class="increase-btn" data-product-id="{{ $id }}">+</button>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('removefromcart', ['product_id' => $id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="remove-btn" style="background-color: red; color: white;">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    <div class="total-price">
                        <h3>Tổng giá trị: {{ number_format($total, 3, ',', '.') }} VNĐ</h3>
                    </div>
                    <button class="order-button" style="background-color: #5a88ca;">
                        <a href="{{ route('products') }}" style="text-decoration: none; color:white;">
                            Tiếp Tục Đặt Hàng
                        </a>
                    </button>
                    <button class="checkout-btn" style="background-color: #5a88ca;">
                        <a href="{{ route('checkout') }}" style="text-decoration: none; color: white;">
                            Thanh Toán
                        </a>
                    </button>
                    @else
                    <p>Giỏ hàng của bạn đang trống.</p>
                    @endif
                </div>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    $(document).ready(function() {
                        function numberWithCommas(x) {
                            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }

                        function updateCart(productId, quantity) {
                            $.ajax({
                                url: '{{ route("updatecart") }}',
                                method: 'patch',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    product_id: productId,
                                    quantity: quantity
                                },
                                success: function(response) {
                                    window.location.reload();
                                }
                            });
                        }

                        $('.increase-btn').click(function() {
                            let $this = $(this);
                            let productId = $this.data('product-id');
                            let $quantityValue = $this.siblings('.quantity-value');
                            let quantity = parseInt($quantityValue.text()) + 1;
                            $quantityValue.text(quantity);
                            updateCart(productId, quantity);
                        });

                        $('.decrease-btn').click(function() {
                            let $this = $(this);
                            let productId = $this.data('product-id');
                            let $quantityValue = $this.siblings('.quantity-value');
                            let quantity = parseInt($quantityValue.text());
                            if (quantity > 1) {
                                quantity--;
                                $quantityValue.text(quantity);
                                updateCart(productId, quantity);
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
