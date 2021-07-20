@extends('layout_web')
@section('content')
<section id="cart_items">
    <div class="container" style="margin-bottom: 80px">
        <div class="table-responsive cart_info">
            <table class="table" style="color: green">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item Product</th>  
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col"> Subtotal</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    @isset($data)
                    @foreach ($data as $item)
                    <tr id="row-{{$item->id}}">
                        <td style="color: black">{{$item->id}}</td>
                        <th style="color: black">{{$item->name}}</th>
                        <td style="color: black"><input type="number" data-id="{{$item->id}}" value="{{$item->quantity}}" class="quantities"></td>
                        <td style="color: black">{{$item->price}}</td>
                        <td class="sub-total" id="sub-{{$item->id}}" style="color: black"> {{$item->getSubTotal()}}</td>
                        <td><button class="btn-danger btn-del" data-id="{{$item->id}}">Delete</button></td>
                        
                    </tr>
                    @endforeach
                    @endisset                    
                </tbody>                
            </table>
            @if ($data == null)
                <h2 style="text-align: center">There Are No Products In The Shopping Cart</h2>
            @endif
            <h1 style="float: right" >Total: <span id="total" style="color: red"></span></h1>
            <span id="login" style="display: none">{{session()->get('login')}}</span>
        </div>
        @if (session('cart') != null)
            <div style="text-align: center;height: 45px;"><button style="width: 20%;height: 100%;background-color: cadetblue;"><a href="#" id="savetotal">CHECKOUT</a></button></div>
        @endif
    </div>
    
</section> <!--/#cart_items-->


@endsection

@section('scripts')
    <script>
        function tinh(){
            var len=document.getElementsByClassName("sub-total").length;            
            var sum = 0;
            for(var i =0;i<len;i++)
            {
                var val=document.getElementsByClassName("sub-total").item(i).innerHTML;
                sum = sum + parseInt(val);                
            }    
            document.getElementById('total').innerText=sum;
        }
        $('.quantities').change(function(){            
            if($(this).val()<=0)
            {
                $(this).val(1)
                
            }
            var val=$(this).val()
            var id=$(this).data('id')
            var id_sub="#sub-"+id;
            $.get('upquantity',{ id:id, sl:val },
                function(data){                         
                    $(id_sub).text(data)
                    tinh()
            })                        
        })
        $('.quantities').keyup(function(){            
            if($(this).val()<=0)
            {
                $(this).val(1)
                
            }
            var val=$(this).val()
            var id=$(this).data('id')
            var id_sub="#sub-"+id;
            $.get('upquantity',{ id:id, sl:val },
                function(data){                         
                    $(id_sub).text(data)
                    tinh()
            })                        
        })
        $('.btn-del').click(function(){
            var id = $(this).data('id');
            $.get('delitem',{id:id},function(data){
              alert(data);
              window.location.reload(true);
            })
            $('#row-'+id).remove();
            tinh()
        })
        tinh()
        $('#addbill').click(function () {            
            var login = $('#login').text();
            var total = $('#total').text();             
            if(login == 0 || login == null){
                alert('You Must Login First To CheckOut');
                return 0;
            }
            var f = confirm('Do You Want To Confirm A Bill ?');        
            if(f == true && login == 1){
                $.get('addbill',{total:total},function(data){
                    alert(data);
                    window.location.reload(true);
                });
            }
        });
        $('#savetotal').click(function () { 
            var login = $('#login').text();
            var total = $('#total').text();                
            if(login != 1){
                alert('You Must Login First To CheckOut');
                return 0;
            }                      
            $.get('session',{total:total},function(data){
                window.location.href = data;
            });
        });
    </script>
@endsection