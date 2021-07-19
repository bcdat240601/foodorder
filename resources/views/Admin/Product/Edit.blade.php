@extends('admin/layout')
@section('content')
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Product:</h2>
    <span id="thongbao" style="color: red;display: none;">Fill Full Infor</span>
    <form id="form" action="{{ route('food.edit') }}"  enctype="multipart/form-data" method="POST">
        @csrf
        <input type="text" name="id" value="{{$data->id}}" hidden>
        <br><p style="color: green">Product Name:</p><input class="name" type="text" name="FoodName" value="{{$data->FoodName}}"><br>
        <p style="color: green">Price:</p><input type="number" name="Price" value="{{$data->Price}}"> <br>
        <p style="color: green">Description:</p><textarea class="mota" name="Description" id="" cols="80" rows="10" value="{{$data->Description}}"></textarea> 
        <p style="color: green">Quantity:</p><input type="number" name="Quantity" value="{{$data->Quantity}}"><br>
        <p style="color: green">Category ID:</p><select name="CategoryID" id="">
            @foreach ($category as $item)
            <option value={{$item->id }}>{{$item->CatagoryName}}</option>
            @endforeach
        </select><br>      
        <br><img src="{{ asset('images/product-details/'. $data->Image_Name) }}" style="width: 100px; height: 100px;" alt="">
        <p style="color: green">Image_Name:</p><input type="file" name= "Image_Name" accept="image/png, image/jpeg"/><br>
        <br><input type="submit" value="Edit product" style="background-color: crimson; color: white"/>
        <button style="background-color: green;"><a href="{{ asset('admin/product/index') }}" style="color: white">Return Manage Product page</a></button><br>
        <br>
    </form>
</div>
@endsection
@section('script')
<script>
    // $('#price').css('display', 'none');
    $('#thongbao').css('display', 'none');
    $('#form').submit(function () { 
      var ten = $('.name').val();      
      var mota = $('.mota').val();    
      if(ten != "" && mota != ""){
          alert('success');
          return true;
      }else{        
      $('#thongbao').css('display', 'block');
      return false;
      }
    });
  </script>
  @endsection