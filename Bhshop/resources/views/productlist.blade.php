@extends('adminlayout')
@section('title','AD | QTShop')
@section('adcontent')

<section>
    <div class="container">
        <div class="col3">
            <h2>Thêm Mới Sản Phẩm</h2>
            
            <form action="{{ route('productadd')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <select name="category_id" id="">
                    <option value="0" selected>Chọn danh mục</option>
                    @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                    
                </select>
                <input type="text" name="name" placeholder="Tên sản phẩm">
                <input type="text" name="price" placeholder="Giá">
                <input type="file" name="img">
                <input type="submit" value="Thêm">
            </form>
        </div>
        <div class="col9">
            <h2>Danh Sách Sản Phẩm</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Lượt xem</th>
                        <th>Lượt bán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    

                     
@foreach ($products as $item)
<tr>
<td>{{ $item->id }}</td>
<!--<td><img src="{{ asset('uploaded/'.$item->img) }}" width="80" alt=""></td> -->
<td><img src="img/{{ $item->img }}" width="80" alt=""></td> <td>{{ $item->name }}</td>
<td>{{ number_format($item->price, 0, ',','.') }} vnd</td> <td>{{ $item->quantity }}</td>
<td>{{ $item->sold }}</td>
<td class="action-icons">
                            <a href="{{ route('productupdateform',$item->id) }}">Edit</a>
                            -
                            <a href="{{ route('productdelete',$item->id) }}">Delete</a>
                        </td>
</tr>
@endforeach
                    
                    
                    <!-- Các hàng khác -->
                </tbody>
                
            </table>
          
 
    {{ $products->links('pagination::default') }}
  

                           
                        
                            
                          
        </div>
    </div>
    
</section>

@endsection('content')