@extends('admin/layout')
@section('content')
<div class="container">
    <div class="table-responsive"> 
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">CustomerName</td>
                <td style="color: white; background-color: orangered">Address</td>
                <td style="color: white; background-color: orangered">Phone</td>
                <td style="color: white; background-color: orangered">Status</td>
                <td style="color: white; background-color: #72A1E5">Delete</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr id="h-{{$item->id }}" data-id="{{$item->id}}">
                    <td style="color: green">
                        {{$item->id}}
                    </td>
                    <td style="color: black">
                        {{$item->CustomerName}}
                    </td>
                    <td style="color: gray">
                        {{$item->Address}}
                    </td>
                    <td style="color: orange">
                        {{$item->Phone}}
                    </td>
                    <td>
                        <a href="{{ asset('admin/customer/edit/'.$item->id) }}">Edit</a>
                    </td>
                    <td><button class="delete" data-row="{{$item->id}}">Delete</button></td>
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
                $.get("cus/delete",{row:row},function(data){
                    if(data != null){
                        alert(data);
                    }else{
                        $("#h-"+row).hide();
                    }
                });                
            }
        });
</script>
@endsection