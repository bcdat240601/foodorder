
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red; text-align: center">New User Signup!</h2>
    <form action="<?php echo e(route("customer.add")); ?>" enctype="multipart/form-data" method="POST" style="text-align: center">
        <?php echo csrf_field(); ?>
        <br><p style="color: green">Customer Name:</p><input type="name" name= "CustomerName" style="width: 300px"/><br>
        <br><p style="color: green">Address: </p><input type="Address" name= "Address" style="width: 300px"/><br>
        <br><p style="color: green">Phone: </p><input type="phone" name="Phone" style="width: 300px"/><br>
        <br><p style="color: green">Email: </p><input type="email" name= "Email" style="width: 300px"/><br>
        <br><p style="color: green">Password: </p><input type="password" name= "Password" style="width: 300px"/><br>
    <br><input type="submit" value="Sign-up" style="background-color: crimson; color: white; width: 300px;"/>      
</form>  
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout_web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views//Admin/Customer/AddCustomer.blade.php ENDPATH**/ ?>