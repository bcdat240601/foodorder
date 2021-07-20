@extends('admin/layout')
@section('content')
<div class="container">
    <div class="table-responsive">
    <table class="table table-bordered display" id="table_id">
        <br>
        <button style="background-color: crimson;"><a href="{{ asset('admin/category/addcategory') }}" style="color: white">Add New Category</a></button><br>
        <br>
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">CategoryName</td>
                <td style="color: white; background-color: orangered">Description</td>
                <td style="color: white; background-color: orangered">Edit</td>
                <td style="color: white; background-color: #72A1E5">Status</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr id="h-{{$item->id }}" data-id="{{$item->id}}">
                <td style="color: green">
                    {{$item->id}}
                </td>
                <td style="color: black">
                    {{$item->CatagoryName}}
                </td>
                <td style="color: green">
                    {{$item->Description}}
                </td>
                <td>
                    <a href="{{ asset('admin/category/edit/'.$item->id) }}">Edit</a>
                </td>
                <td><button @if ($item->avaiable==0)
                    style="display:none;"
                @elseif($item->avaiable==1)
                style="display:block;"
                @endif class="delete" id="of-{{$item->id}}" data-row="{{$item->id}}">OFF</button>
                <button @if ($item->avaiable==1)
                    style="display:none;"
                @elseif ($item->avaiable==0)
                style="display:block;"
                @endif class="on" id="on-{{$item->id}}" data-row="{{$item->id}}">ON</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection
@section('script')
<script>
      $(".delete").click(function () {         
            var f=confirm("Are you sure");
            if(f==true)
            {     
                var row=$(this).data("row");                                
                $.get("cat/delete",{row:row},function(data){                   
                    $("#of-"+row).hide();
                    $("#on-"+row).show();                    
                });                
            }
        });
        $(".on").click(function () {         
            var f=confirm("Are you sure");
            if(f==true)
            {     
                var row=$(this).data("row");                                
                $.get("cat/on",{row:row},function(data){                   
                    $("#of-"+row).show();
                    $("#on-"+row).hide();                    
                });                
            }
        });
</script>
@endsection