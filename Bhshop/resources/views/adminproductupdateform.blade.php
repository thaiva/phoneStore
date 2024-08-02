@extends('adminlayout')
@section('titlepage','Danh sách sản phẩm')
@section('adcontent')
<section>
    <div class="container">
        <div class="col3">
            <h2>Cập nhật Sản Phẩm</h2>
            
            <form action="{{ route('productupdate')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <select name="category_id" id="">
                    <option value="0" selected>Chọn danh mục</option>
                    @foreach ($categories as $item)
                        @if ($item->id==$product->category_id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        
                    @endforeach
                </select>
                {{$product->category_id}}
                <input type="text" name="name" value="{{ $product->name}}" placeholder="Tên sản phẩm">
                <input type="text" name="price" value="{{ $product->price}}" placeholder="Giá">
                <input type="file" name="img">
                <img src="{{ asset('uploaded/'.$product->img)}}" width="120" alt="">
                <input type="text" name="quantity" value="{{ $product->quantity}}" placeholder="Số lượng">
                <textarea name="description" rows="5" style="width:100%" >{{ $product->description}}</textarea>
                <input type="hidden" name="id" value="{{ $product->id}}">
                <input type="submit" value="Cập nhật">
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
                        <th>Số lượng</th>
                        <th>Lượt bán</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ asset('uploaded/'.$item->img) }}" width="80" alt=""></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price,0,',','.')  }} vnđ</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->sold }}</td>
                        <td class="action-icons">
                            <a href="{{ route('productupdateform',$item->id) }}">Edit</a>
                            -
                            <a href="{{ route('productdelete',$item->id) }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="pagination">
                {{$products->links('pagination::default')}}
            </div>
        </div>
    </div>
</section>

@endsection