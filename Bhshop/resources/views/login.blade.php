<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/8808ea2dbf.js" crossorigin="anonymous"></script>
</head>
  <body>
    <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch mt-5 mb-5">
        <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
        <form action="{{ route('login') }}" class="card login-form" method="post">
                    @csrf
            <div class="card-body pt-5 pb-0 ps-5 pe-5  flex-grow-0">
                <h1 class="mb-0 fs-3 fw-bolder">Đăng nhập</h1>
                <div class="fs-exact-14 text-muted mt-2 pt-1 mb-2 pb-2">Đăng nhập để tiếp tục.</div>
                <div class="mb-4">
                <label for="reg-email">Email</label>
                            <input class="form-control" type="email" id="reg-email" name="email" required>
                </div>
                <div class="mb-4">
                <label for="reg-pass">Password</label>
                            <input class="form-control" type="password" id="reg-pass" name="password" required>
                </div>
                @if (Session::has('message'))               
                            <div class="alert alert-danger">
                                {{ Session::get('message') }}
                            </div>
                            @php
                                Session::forget('message');
                                @endphp
                        @endif
                <div class="mb-4 row py-2 flex-wrap">
                    <div class="col-auto me-auto">
                        <label class="form-check mb-0">
                            <input type="checkbox" class="form-check-input"/>
                            <span class="form-check-label">Ghi nhớ đăng nhập</span>
                        </label>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <a href="#">Quên mật khẩu?</a>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Đăng nhập</button>
                </div>
            </div>
        
                
         
            <div class="card-body flex-grow-0">
              <div>Tiếp tục với</div>
                <div class="d-flex flex-wrap me-n3 mt-n3">
                    <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3"><i class="fa-brands fa-google me-2"></i></i>Google</button>
                    <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3"><i class="fa-brands fa-facebook-f me-2"></i>Facebook</button>
                    <button type="button" class="btn btn-secondary flex-grow-1 me-3 mt-3"><i class="fa-brands fa-twitter me-2"></i></i>Twitter</button>
                </div>
                <div class="form-group mb-0 mt-4 pt-2 text-center text-muted">
                    Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
    
</body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>

</html>