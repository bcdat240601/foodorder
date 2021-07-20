@extends('admin/layout')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-2 border-right" style="text-align: center;transform: translate(0%, 100%);">
            {{-- <button class="btn btn-danger" style="width: 150px;height: 65px;"><a style="color: white" href="{{ asset('myprofile') }}">My Profile</a></button> --}}
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 style="color: black" class="text-right">Bill</h3>
                </div>
                <section class="hero-slider">
                    @if (isset($bill) && !$bill->isEmpty())
                    <table class="table table-dark table-striped" style="margin-top: 20px;">
                        <thead>
                          <tr>
                            <th scope="col">Bill Code:</th>                            
                            <th scope="col">Total:</th>
                            <th scope="col">Date:</th>
                            <th scope="col">Detail:</th>   
                            <th scope="col">delete</th>                           
                          </tr>
                        </thead>                        
                        <tbody>                            
                            @foreach ($bill as $item)
                            <tr id="h-{{$item->ID}}" data-id="{{$item->ID}}">
                            <td><a>{{$item->ID}}</a></td>                                
                            <td> {{number_format($item->Total)}} VNĐ</td>
                            <td> {{$item->created_at}}</td>
                            <td class="detail"><a style="color: red" href="{{ asset('admin/customer/debl='.$item->ID) }}">Invoice Detail</a></td>   
                            <td><button class="delete" data-row="{{$item->ID}}">Delete</button></td>                             
                            </tr>
                            @endforeach                                                                                        
                        </tbody>                                                                       
                    </table>
                    @else
                            <h3>This Customer Hasn't Purchased Any Items</h3>    
                    @endif 
            </div>
        </div>                    
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
                $.get("bill/delete",{row:row},function(data){
                });
                $("#h-"+row).hide();
            }
        });
</script>
@endsection
