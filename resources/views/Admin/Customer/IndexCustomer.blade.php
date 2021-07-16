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
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endsection