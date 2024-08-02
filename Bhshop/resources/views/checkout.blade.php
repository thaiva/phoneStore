@extends('layout')
@section('title', 'Thanh toán')
@section('title2', 'Thanh toán')
@section('content')



    <!-- Join Now Start -->
    <div class="container">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Thanh toán</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-6 mb-5">
                <div class="contact-form bg-light p-30">
                   
                    <form id="orderForm" class="order-form"><div class="form-row">
                    <h3 id="order_review_heading">Thông tin người đặt</h3>
  <div class="form-col">
    <label for="fullName">Họ và Tên:</label>
  </div>
  <div class="form-col">
    <input type="text" id="fullName" name="fullName" class="form-control" required>
  </div>
</div>
<div class="form-row">
  <div class="form-col">
    <label for="email">Email:</label>
  </div>
  <div class="form-col">
    <input type="email" id="email" name="email" class="form-control" required>
  </div>
</div>
<div class="form-row">
  <div class="form-col">
    <label for="sdt">Số điện thoại:</label>
  </div>
  <div class="form-col">
    <input type="text" id="sdt" name="sdt" class="form-control" required>
  </div>
</div>
<div class="form-row">
  <div class="form-col">
    <label for="address">Địa Chỉ:</label>
  </div>
  <div class="form-col">
    <textarea id="address" name="address" class="form-control" rows="2" required></textarea>
  </div>
</div>
</form>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="contact-form bg-light p-30">
                <div class="right-box-bill">
      
                <h3 id="order_review_heading">Your order</h3>

<div id="order_review" style="position: relative;">
    <table class="shop_table">
        <thead>
            <tr>
                <th class="product-name">Product</th>
                <th class="product-total">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr class="cart_item">
                <td class="product-name">
                    @foreach($cart as $id => $details)
                    <li><span>{{ $details['name'] }}</span><span>{{ number_format($details['price'], 3, ',', '.') }} VNĐ</span><span>x{{ $details['quantity'] }}</span></li>
                    @endforeach </td>
                <td class="product-total">
                    <div class="total">Tổng Cộng: <span>{{ number_format($total, 3, ',', '.') }} VNĐ</span></div>
                </td>
            </tr>
        </tbody>
        <tfoot>



            <tr class="shipping">
                <th>Shipping and Handling</th>
                <td>

                    Free Shipping
                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                </td>
            </tr>


            <tr class="order-total">
                <th>Order Total</th>
                <td><strong><div class="total">Tổng Cộng: <span>{{ number_format($total, 3, ',', '.') }} VNĐ</span></div></strong> </td>
            </tr>

        </tfoot>
    </table>


    <div id="payment">
        <ul class="payment_methods methods">
            <li class="payment_method_bacs">
                <input type="radio" name="paymentMethod" id="cod" value="cod">
                <label for="cod">Thanh toán khi nhận hàng</label>

            </li>
            <li class="payment_method_cheque">
                <input type="radio" name="paymentMethod" id="momo" value="momo">
                <label for="momo">Thanh toán ví điện tử</label>

            </li>
            <li class="payment_method_paypal">
                <input type="radio" name="paymentMethod" id="banktransfer" value="banktransfer">
                <label for="banktransfer">Thanh toán ngân hàng</label><img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png">
                </label>

            </li>
        </ul>

    </div>
</div>

        <form action="{{ route('processCheckout') }}" method="POST">
            @csrf
            <button type="submit" class="checkout-btn">Thanh Toán</button><br><br>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Join Now End -->

@endsection
