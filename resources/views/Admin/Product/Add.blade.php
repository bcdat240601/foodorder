@extends('admin/layout')
@section('content')

    <div class="container" style="margin-left: 100px">
        <h2 style="color: red">Add Product:</h2>
        <span id="thongbao" style="color: red;display: none;">Fill Full Infor</span>
    <form id="form" action="{{ route("food.add")}}" enctype="multipart/form-data" method="POST">
        @csrf
        <br><p style="color: green">Product Name:</p><input  class="name" type="text" name= "FoodName"/><br>
        <p style="color: green">Price: </p><input type="number" name= "Price"/><br>
        <p style="color: green">Description: </p>
        <textarea class="mota" name="Description" id="" cols="80" rows="10"></textarea> 
        <p style="color: green">Quantity: </p><input type="number" name= "Quantity"/><br>
        <p style="color: green">Image_Name:</p><input type="file" name= "Image_Name" accept="image/png, image/jpeg"  required value=""><br>
        <p style="color: green">Category ID:</p><select name="CategoryID" id="">            
        @if (isset($category))
            @foreach ($category as $item)
                <option value={{$item->id}}>{{$item->CatagoryName}}</option>
            @endforeach
        @endif
        </select><br> 
        <br><input type="submit" value="Add product" style="background-color: crimson; color: white" />   
    </form>  
    <button style="background-color: blue;"><a href="{{ asset('admin/product/index') }}" style="color: white">back</a></button><br>   
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
          alert('Add success');
          return true;
      }else{        
      $('#thongbao').css('display', 'block');
      return false;
      }
    });
  </script>
  @endsection