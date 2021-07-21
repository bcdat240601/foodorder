@extends('layout_web')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        {{-- <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options--> --}}

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        {{-- <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>					
            </div>
        </div> --}}
        {{-- <div id="customer-information">
            <div id="row">
                <input type="text">
            </div>
        </div> --}}
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">        
            <table class="table" style="color: green">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item Product</th>  
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col"> Subtotal</th>                    
                  </tr>
                </thead>
                <tbody>
                    @isset($data)
                    @foreach ($data as $item)
                    <tr id="row-{{$item->id}}">
                        <td style="color: black">{{$item->id}}</td>
                        <th style="color: black">{{$item->name}}</th>
                        <td style="color: black"><input style="pointer-events: none" type="text" data-id="{{$item->id}}" value="{{$item->quantity}}" class="quantities"></td>
                        <td style="color: black">{{$item->price}}</td>
                        <td class="sub-total" id="sub-{{$item->id}}" style="color: black"> {{$item->getSubTotal()}}</td>                        
                        
                    </tr>
                    @endforeach
                    @endisset   
                    @if (session()->has('total'))
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">                                
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span id="total">{{session()->get('total')}}</span> $</td>
                                </tr>
                            </table>
                        </td>
                    </tr>                 
                    @endif
                </tbody>                
            </table>
            <a href="{{ asset('cart') }}"><button>Edit Cart</button></a>
        </div>        
    </div>
    <span id="login" style="display: none">{{session()->get('login')}}</span>
    <div style="text-align: center;height: 45px;" id="paypal-button"></div>
</section> <!--/#cart_items-->
    
@endsection
@section('scripts')
        {{-- paypal checkout   --}}
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
        var login = $('#login').text();
        var total = $('#total').text();
        paypal.Button.render({
        env: 'sandbox', // Or 'production'
        style: {
          size: 'large',
          color: 'gold',
          shape: 'pill',
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post('api/create-payment?total='+ total)
            .then(function(res) {
              // 3. Return res.id from the response
              // console.log(res);
              return res.id;
            });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
          // 2. Make a request to your server
          return actions.request.post('api/execute-payment', {
            paymentID: data.paymentID,
            payerID:   data.payerID
          })
            .then(function(res) {
              console.log(res);              
              $.get('addbill',{total:total},function(data){
                    alert(data);
                    window.location.reload(true);
                });
              // 3. Show the buyer a confirmation message.
            });
        }
      }, '#paypal-button');
        </script>
@endsection