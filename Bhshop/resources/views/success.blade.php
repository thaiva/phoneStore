@extends('layout')
@section('title', 'Thanh toán thành công')
@section('title2', 'Thanh toán thành công')
@section('content')

<body>
   
        <div class="min-h-100 p-0 p-sm-6 d-flex align-items-stretch">
            <div class="card w-25x flex-grow-1 flex-sm-grow-0 m-sm-auto">
                <div class="card-body p-sm-5 m-sm-3 flex-grow-0">
              
                   
                    <div class="container">
                    <h1 id="order_review_heading">Thanh toán thành công</h1>
                    <div class="alert alert-success alert-sa-has-icon mt-4 mb-4" role="alert">
                        <div class="alert-sa-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="alert-sa-content">
                           Đơn hàng đã được thanh toán.<br>Cảm ơn quý khách đã mua sắm tại website của chúng tôi.
                        </div>
                        
                    </div>
                    <p class="mb-0 sa-text--sm">
                        Trở về <a href="{{ route('home') }}">Trang chủ.</a>
                        
                    </p>
                </div>
            </div>
        </div>
        </div>
    </body>

@endsection
