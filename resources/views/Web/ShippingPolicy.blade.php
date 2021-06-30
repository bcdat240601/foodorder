@extends('layout_web')
@section('content')
<div class="container" style="background-color: white; height:100px;">
        <h2 class="Shipping Policy" style="color: red">Shipping Policy</h2>
        <p>
            <em style="color:blue">For the convenience of goods transportation and payment, GreenFood would like to introduce a notice board to send to customers!</em>
        </p>
        <p>
            <strong style="color: green">SHIPPING POLICY:</strong>
        </p>
        <p>
            <strong style="color: green">(Applicable for online orders)</strong>
        </p>
        <p>Delivery location: GREENFOOD MART: 330/18/16B Au Duong Lan, Ward 3, District 8, HCMC</p>
        <p>Delivery scope: Ho Chi Minh City</p>
        <p>
            <strong style="color: green">1. Shipping fee</strong>
        </p>
        <p>
            Delivery policy with 300,000 VND we will support delivery throughout the inner city district of Ho Chi Minh City.
        </p>
        <!-- Start remove-->
        <table border="1" cellpadding="0" cellspacing="0" style="width: 606px;">
            <tbody>
                <tr>
                    <td style="height: 95px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color: red">Numerical order</strong>
                        </p>
                    </td>
                    <td style="height: 95px; width: 161px;">
                        <p style="text-align: center">
                            <strong style="color: red">Delivery policy</strong>
                        </p>
                    </td>
                    <td style="height: 95px; width: 191px;">
                        <p style="text-align: center">
                            <strong style="color: red">Order value</strong>
                        </p>
                    </td>
                    <td style="height: 95px; width: 119px;">
                        <p style="text-align: center">
                            <strong style="color:red">Radius Km
                            <sup>2</sup></strong>
                        </p>
                    </td>
                    <td style="height: 95px; width: 119px;">
                        <p style="text-align: center">
                            <strong style="color:red">Transportation costs
                            </strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="height: 45px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color:red">1</strong>
                        </p>
                    </td>
                    <td rowspan="5" style="height: 45px; width: 161px">
                        <p style="text-align: center">
                            We support door-to-door delivery service with orders over 300,000 in 
                            all inner districts of Ho Chi Minh
                        </p>
                    </td>
                    <td style="height: 45px; width: 191px;">
                        <p style="text-align: center">
                            500.000 VND ABOVE </p>
                    </td>
                    <td style="height: 45px; width: 119px;">
                        <p style="text-align: center">
                            BELOW 0.5 KM
                            <sup>2</sup>
                        </p>
                    </td>
                    <td style="height: 45px; width: 80px;">
                        <p style="text-align: center">
                            FREE </p>
                    </td>
                </tr>
                <tr>
                    <td style="height: 48px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color: red">2</strong>    
                        </p>
                    </td>
                    <td style="height: 48px; width: 191px;">
                        <p style="text-align: center">
                            500.000 VND ABOVE </p>
                    </td>
                    <td style="height: 48px; width: 119px;">
                        <p style="text-align: center"></p>
                        <p style="text-align: center">
                            BELOW 10 KM
                            <sup>2</sup>
                        </p>
                        <p style="text-align: center"></p>
                    </td>
                    <td style="height: 48px; width: 80px;">
                        <p style="text-align: center">
                            FREE </p>
                    </td>
                </tr>
                <tr>
                    <td style="height: 48px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color:red">3</strong>
                        </p>
                    </td>
                    <td style="height: 48px; width: 191px;">
                        <p style="text-align: center">
                            UNDER 500,000 VND </p>
                    </td>
                    <td style="height: 48px; width: 119px;">
                        <p style="text-align: center">
                            BELOW 0.5 KM
                            <sup>2</sup>
                        </p>
                    </td>
                    <td style="height: 48px; width: 80px;">
                        <p style="text-align: center">
                            20.000 VND </p>
                    </td>
                </tr>
                <tr>
                    <td style="height: 48px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color: red">4</strong>    
                        </p>
                    </td>
                    <td style="height: 48px; width: 191px;">
                        <p style="text-align: center">
                            UNDER 500,000 VND </p>
                    </td>
                    <td style="height: 48px; width: 119px;">
                        <p style="text-align: center">
                            BELOW 10 KM
                            <sup>2</sup>
                        </p>
                    </td>
                    <td style="height: 48px; width: 80px;">
                        <p style="text-align: center">30.000 VND</p>   
                    </td>
                </tr>
                <tr>
                    <td style="height: 48px; width: 54px;">
                        <p style="text-align: center">
                            <strong style="color: red">5</strong>    
                        </p>
                    </td>
                    <td style="height: 48px; width: 191px;">
                        <p style="text-align: center">
                            UNDER 500,000 VND </p>
                    </td>
                    <td style="height: 48px; width: 119px;">
                    <p style="text-align: center">
                        FROM 10KM
                        <sup>2</sup>
                        - 15KM
                        <sup>2</sup>
                    </p>
                    </td>
                    <td style="height: 48px; width: 80px;">
                        <p style="text-align: center">35.000 VND</p>   
                    </td>
                </tr>
            </tbody>
        </table>
        <!--end remove-->
        <br>
        <p>
            <strong style="color: green">2. Order time</strong>
        </p>
        <p style="margin-left: .25in">- Order before 9:30am, deliver before 11:30am or earlier</p>
        <p style="margin-left: .25in">- Orders at 10:30 am delivered before 12 pm or earlier</p>
        <p style="margin-left: .25in">- Orders placed before 2:30pm will be delivered by 4:30pm earlier</p>
        <p style="margin-left: .25in">- Orders at 4:30pm will be delivered before 6pm or earlier</p>
        <p style="margin-left: .25in">- Last order received at 5pm will be delivered before 7pm or earlier</p>
        <p style="margin-left: .25in">
            Orders arising after 5pm Green Foods Mart ask for your permission to deliver the next day or notify 
            customers to come directly to the store to receive the goods.</p>
        
        <p>
            <strong style="color: green">3. Request when receiving goods</strong>
        </p>
        <p>
            Please pay in full and check the goods before receiving the goods. It is recommended to keep the purchase 
            receipt for use when requesting a product return.
        </p>
        <p>
            If you have any questions or comments, please contact:
        </p>
        <p>
            Hotline Ordering (Free): 0753 869006
        </p>
        <p>
            Email: 
            <strong style="color: red">anhkietmail2@gmail.com</strong>
        </p>







@endsection