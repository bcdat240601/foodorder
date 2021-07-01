
<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="urllogin" style="display: none;"><?php echo e(asset('login')); ?></div>
        <main style="background-color:white; min-height: 300px; padding: 7.5px 15px;">
            <div class="container" style="width: 100%; max-width: 1200px; margin-left: auto; margin-right: auto;">
            <div class="login-form" style="width: 100%; max-width: 500px; margin: 30px auto;  background-color: #ffffff; padding: 20px; border: 3px dotted #cccccc; border-radius: 10px;">                                                    
                    <h1 style="color:red; font-size: 20px; margin-bottom: 30px;">New User Signup!</h1>
                    <span id="thongtin" style="display: none;width:332px;color:red;">Thiếu Thông Tin, Xin Vui Lòng Điền Đầy Đủ Thông Tin</span>
                    <span id="ten" style="display: none;width:332px;color:red;">Tên Người Dùng Có Kí Tự Đặc Biệt</span>
                    <div class="input-box" style="margin-bottom: 10px;">
                        <i ></i>
                        <input type="name" class="name" name="CustomerName" placeholder="Enter your customer name" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="Address" class="address" name="Address" placeholder="Enter your address" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <span id="SDT" style="display: none;width:332px;color:red;">Sai Hoặc Thiếu Số Điện Thoại</span>    
                    <div class="input-box">
                        <i ></i>
                        <input type="phone" class="phone" name="Phone" placeholder="Enter your phone" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <span id="Email2" style="display: none;width:332px;color:red;">Trùng Email</span>
                    <div class="input-box">
                        <i ></i>
                        <input type="email" class="email" name="Email" placeholder="Enter your email" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" class="password" name="Password" placeholder="Enter your password" style="padding: 7.5px 7.5px;width: 100%; border: 1px solid #cccccc;outline: none;" required>
                    </div>
                    <div class="btn-box" style="text-align: right;margin-top: 30px;">
                        <button type="submit" style="padding: 7.5px 15px;border-radius: 2px;background-color: #009999;color: #ffffff;border: none;outline: none; width: 100px;" class="nhan">
                            Sign-up
                        </button>
                    </div>                                
            </div>
            </div>
        </main>
    </body>
</html>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $('.nhan').click(function () {
            $('#ten').css('display', 'none');
            $('#thongtin').css('display', 'none');
            // $('#taikhoan').css('display', 'none');
            $('#SDT').css('display', 'none');
            // $('#Email1').css('display', 'none');
            $('#Email2').css('display', 'none');
            // var fullname = $('.fullname').val();
            var CustomerName = $('.name').val();
            var Password = $('.password').val();
            var Address = $('.address').val();
            // var birthday = $('.birthday').val();
            var Phone = $('.phone').val();
            var Email = $('.email').val();                    
            if(CustomerName != '' && Password != '' && Address != '' && Phone != '' && Email != ''){
                if (checkphone(Phone)) {                
                    if(checkfullname(CustomerName)){
                        $.post('AddCustomer',{"_token": "<?php echo e(csrf_token()); ?>",CustomerName:CustomerName,Password:Password,Address:Address,Phone:Phone,Email:Email},function(data){                    
                        if(data == 2){
                            $('#Email2').css('display', 'inline-block');                            
                        }
                        if(data == 0){
                            alert('Đăng Kí Thành Công,Bạn Sẽ Được Chuyển Sang Trang Đăng Nhập');
                            window.location.href = $('#urllogin').text();
                        }
                    });
                    }else{
                        $('#ten').css('display', 'inline-block');
                    }                                    
                }else {                
                    $('#SDT').css('display', 'inline-block');                
                }
            }else{
                $('#thongtin').css('display', 'inline-block');
            }        
            
        });
    function checkphone(pho){
        var phone = pho;
        if(phone.match(/((09|03|07|08|05|01)([0-9]{8})\b)/) != null){
            return true;
        }
        return false;
    }
    function checkemail(ema){
        var email = ema;
        if(email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/) != null){
            return true;
        }
        return false;
    }
    function checkfullname(full){
        var fullname = full;
        fullname = xoa_dau(fullname);
        if(fullname.match(/^[0-9a-zA-Z ]+$/) != null){
            return true;
        }
        return false;
    }
    function xoa_dau(a) {
        a = a.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/,'a');
        a = a.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/, "e");
        a = a.replace(/ì|í|ị|ỉ|ĩ/, "i");
        a = a.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/, "o");
        a = a.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/, "u");
        a = a.replace(/ỳ|ý|ỵ|ỷ|ỹ/, "y");
        a = a.replace(/đ/, "d");
        a = a.replace(/ {1,}/," ");
        return a;
        
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Admin/Customer/AddCustomer.blade.php ENDPATH**/ ?>