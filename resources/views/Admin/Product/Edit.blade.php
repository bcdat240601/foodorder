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
            <option value=2 @if ($data->CategoryID==2)selected @endif>Fresh Food</option>
            <option value=3 @if ($data->CategoryID==3)selected @endif>Meat</option>
            <option value=4 @if ($data->CategoryID==4)selected @endif>Fruit</option>
            <option value=5 @if ($data->CategoryID==5)selected @endif>Sea Food</option>
            <option value=6 @if ($data->CategoryID==6)selected @endif>Canner Food</option>
            <option value=7 @if ($data->CategoryID==7)selected @endif>Vegetables</option>
            <option value=8 @if ($data->CategoryID==8)selected @endif>Drinks</option>
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