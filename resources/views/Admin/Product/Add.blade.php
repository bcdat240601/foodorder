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
            <option value=2>Fresh Food</option>
            <option value=3>Meat</option>
            <option value=4>Fruit</option>
            <option value=5>Sea Food</option>
            <option value=6>Canner Food</option>
            <option value=7>Vegetables</option>
            <option value=8>Drinks</option>
        </select><br> 
        <br><input type="submit" value="Add product" style="background-color: crimson; color: white" />   
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
          alert('Add success');
          return true;
      }else{        
      $('#thongbao').css('display', 'block');
      return false;
      }
    });
  </script>
  @endsection