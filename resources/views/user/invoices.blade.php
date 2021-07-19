@extends('layout_web')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row" style="border-top: solid 1px;border-bottom: solid 1px;margin-bottom: 80px;">
        <div class="col-md-3 border-right" style="text-align: center;transform: translate(0%, 100%);">
            <button class="btn btn-danger" style="width: 150px;height: 65px;"><a style="color: white" href="{{ asset('myprofile') }}">My Profile</a></button>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="text-right">Invoices</h3>
                </div>
                <section class="hero-slider">
                    <table class="table table-success table-striped" style="margin-top: 20px;">
                        <thead>
                          <tr>
                            <th scope="col">Bill Code:</th>                            
                            <th scope="col">Total:</th>
                            <th scope="col">Date:</th>
                            <th scope="col">Detail:</th>                            
                          </tr>
                        </thead>
                        <tbody>
                            @if (isset($hoadon))
                                @foreach ($hoadon as $item)
                                <tr>
                                <td><a>{{$item->ID}}</a></td>                                
                                <td> {{number_format($item->Total)}} VNĐ</td>
                                <td> {{$item->created_at}}</td>
                                <td class="detail"><a href="{{ asset('invoicesdetail?id='.$item->ID) }}">Invoice Detail</a></td>                                
                                </tr>
                                @endforeach
                            @else
                                <h3>BẠN CHƯA THANH TOÁN HÓA ĐƠN NÀO</h3>
                            @endif
                        </tbody>                        
                    </table>
            </div>
        </div>                    
    </div>
</div>

@endsection