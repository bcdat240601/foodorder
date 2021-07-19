@extends('layout_web')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row" style="margin-bottom: 80px;border-top: solid 1px;border-bottom: solid 1px;padding-bottom: 25px;">
        <div class="col-md-3 border-right" style="text-align: center;transform: translate(0%, 100%)">
            <button class="btn btn-danger" style="width: 150px;height: 65px;"><a style="color: white" href="{{ asset('myprofile') }}">My Profile</a></button>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Invoices Detail</h3>
                </div>
                <section class="hero-slider">
                    <table class="table table-success table-striped" style="margin-top: 20px;">
                        <thead>
                          <tr>
                            <th scope="col">Food Name</th>
                            <th scope="col">Quantity</th>         
                            <th scope="col">Unit Cost</th>                   
                            <th scope="col">Sub Total </th>
                            <th scope="col">Date</th>                            
                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($hoadondt))
                                @foreach ($hoadondt as $item)
                                <tr>
                                <td><a>{{$item->FoodName}}</a></td>
                                <td><a>{{$item->Quantity}}</a></td>                                                                
                                <td> {{number_format($item->UnitCost)}} VNĐ</td>
                                <td> {{number_format($item->Subtotal)}} VNĐ</td>
                                <td> {{$item->created_at}}</td>                                
                                </tr>
                                @endforeach
                            @else
                                <h3>BẠN CHƯA THANH TOÁN HÓA ĐƠN NÀO</h3>
                            @endif
                        </tbody>
                    </table>    
                    <button><a href="{{ asset('invoices') }}">Go Back</a></button>                
            </div>            
        </div>                    
    </div>
</div>

@endsection