@extends('layout')
@section('title','Contact | QTShop')
@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Contact</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
    <div class="row">
      <div class="col-lg-6">
        <h1 class="mb-4">Liên hệ</h1>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Nhập email">
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Nội dung</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
      </div>
      <div class="col-lg-6">
        <br>
        <h2 class="mb-4">Thông tin liên hệ</h2>
        <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
        <p>Điện thoại: 0123456789</p>
        <p>Email: example@example.com</p>
        
        <i class="fa-brands fa-square-facebook fa-2x"></i>
        <i class="fa-brands fa-square-twitter fa-2x m-3"></i>
        <i class="fa-brands fa-square-instagram fa-2x"></i>
        <i class="fa-brands fa-square-pinterest fa-2x m-3"></i>
      
      </div>
    </div>
  </div>
@endsection('content')