@extends('admin/layout')
@section('content')

<div class="container">
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        <div class="product">
            <div class="">
            <img class="imge" src="{{ asset('images/product-details/'.$data->Image_Name) }}" alt="" />
            </div>
            <div class="info">
                <h2 style="color: green"> {{$data->FoodName}}</h2>
                <h2 style="color:green">Product Description</h2>
                            <p>{{$data->Description}}</p>
            </div>
        </div>
    <br>
    <div class="table-responsive">
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: #72A1E5">Avatar</td>
                <td style="color: white; background-color: #72A1E5">Customer Name</td>
                <td style="color: white; background-color: #72A1E5">Comment</td>
                <td style="color: white; background-color: #72A1E5">Delete</td>
                <td style="color: white; background-color: #72A1E5">Answer</td>
            </tr>
        </thead>
        <tbody>
            @if (isset($binhluan))
            @foreach ($binhluan as $item)
            <input type="text" name="id" class="getidcus" value="{{$data->id}}" style="display: none">
                <tr id="cmt-{{$item->stt}}" data-id="{{$item->stt}}">
                    <td style="color: black">
                        <img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="text-align: right;">
                    </td>
                    <td style="color: black;font-family: ui-monospace;font-size: 22px;">
                        <span>{{$item->CustomerName}}</span>
                    </td>
                    <td style="color: Green">
                        {{$item->loibinhluan}}
                    </td>
                    <td><button class="delete" data-row="{{$item->stt}}">Delete</button></td>
                    <td><button 
                        @if (isset($item->checki))
                        style="display:none;"
                        @else
                        style="display:block;"
                        @endif 
                    class="btn-answer" id="btn-{{$item->stt}}" data-check="{{$item->checki}}" data-id="{{$item->stt}}" data-ro="{{$data->id}}">Answer</button>
                    <span id="inf-{{$item->stt}}"
                        @if ($item->checki!=0)
                        style="display:none;"
                        @else
                        style="display:block;"
                        @endif> 
                    {{$item->answer}}</span>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <span id="nice"></span>
    <span style="display: none" id="getidkh"></span> 
    <span style="display: none" id="getidbl"></span>
    <span style="display: none" id="getrow"></span>
    </div>
    <br>
        {{-- <button style="background-color: crimson;"><a href="{{ asset('admin/product/add') }}" style="color: white">Add New Product</a></button><br> --}}
        <div  class="product answer" style="background-image: linear-gradient(
            291deg
            ,#0f757c 10%,#7de8e1 100%);">
            <div class="">
            </div>
            <div class="info">
                <h2 style="color:green">Insert Your Answer Here</h2>
                <div style="display: flex;align-items: flex-end;"><img class="img-profile rounded-circle"src="{{ asset('img/man.png') }}" style="">
                <input class="form-control formnhap" type="text" name="comment" placeholder="Rating Product..." style="padding-right: 6px;margin-left: 10px;"></div>
                <button type="submit" class="btn btn-warning traloi" style="background: #7553f1;margin-top:11px;margin-bottom: 11px;">Post</button>
            </div>
        </div>
    <br>
</div>
    
@endsection
@section('script')
<script>
       $(".delete").click(function () {         
            var f=confirm("Are you sure");
            if(f==true)
            {     
                var row=$(this).data("row");                
                $.get("comment/delete",{row:row},function(data){
                });
                $("#cmt-"+row).hide();
            }
        });
        $(".btn-answer").click(function (e) {
            var ro=$(this).data("ro");
            var id=$(this).data("id");
           $(".answer").css("display","block");
           $("#getidkh").text(ro);
           $("#getidbl").text(id);
        
        });
        $(".btn-answer").click(function (e) {
            var id=$(this).data("id");
            $("#read-"+id).css("display","none");
            // $("#inf-"+id).css("display","block");
        
        });
        $('.traloi').click(function () { 
            var loibinhluan = $('.formnhap').val();
            // var idcus = $('.getidcus').val();
            var cusid = $('#getidkh').text();
            var idbl = $('#getidbl').text();            
            if(loibinhluan != ''){
                $.post('answer',{"_token": "{{ csrf_token() }}",loibinhluan:loibinhluan,cusid:cusid,idbl:idbl},function(data){                 
                    $("#inf-"+idbl).text(data);
                });
                alert('success');
                $(".answer").css("display","none");
                $("#btn-"+idbl).attr("disabled", true);
                $("#btn-"+idbl).css("display","none");
            }else{
                alert('You did not answer anything');
            }   
        }); 
        </script>
@endsection