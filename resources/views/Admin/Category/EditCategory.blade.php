@extends('admin/layout')
@section('content')
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Category:</h2>
    <span id="thongbao" style="color: red;display: none;">Fill Full Infor</span>
    <form id="form" action="{{ route("category.edit") }}" enctype="multipart/form-data" method="POST">
        @csrf
        <br><p style="color: green">ID:</p><input style=" pointer-events: none;" type="text" name="id" value="{{$data->id}}"  readonly/><br>
        <p style="color: green">Catagory Name:</p><input  class="name" type="text"  name="CatagoryName" value="{{$data->CatagoryName}}"/><br>
        <p style="color: green">Description:</p><input class="mota" type="text" name="Description" value="{{$data->Description}}"/><br>
        <br><input type="submit" value="Edit Category" style="background-color: crimson; color: white"/>
        <button style="background-color: green;"><a href="{{ asset('admin/category/indexcategory') }}" style="color: white">Return Manage Category page</a></button><br>
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
          alert('Add success');
          return true;
      }else{        
      $('#thongbao').css('display', 'block');
      return false;
      }
    });
  </script>
  @endsection