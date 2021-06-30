
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Customer</h2>
    <form action="<?php echo e(route('customer.edit')); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <br><p style="color: green">ID:</p><input type="text" name="id" value="<?php echo e($data->id); ?>" style="width: 300px"><br>
        <p style="color: green">Customer Name:</p><input type="text" name="CustomerName" value="<?php echo e($data->CustomerName); ?>" style="width: 300px"><br>
        <p style="color: green">Address:</p><input type="text" name="Address" value="<?php echo e($data->Address); ?>" style="width: 300px"><br>
        <p style="color: green">Phone:</p><input type="phone" name="Phone" value="<?php echo e($data->Phone); ?>" style="width: 300px"><br>
        <p style="color: green">Email:</p><input type="email" name="Email" value="<?php echo e($data->Email); ?>" style="width: 300px"><br>
        <p style="color: green">Password:</p><input type="password" name="Password" value="<?php echo e($data->Password); ?>" style="width: 300px"><br>
        <br><input type="submit" value="Edit Customer" style="background-color: crimson; color: white">
        <button style="background-color: green;"><a href="<?php echo e(asset('admin/customer/indexcustomer')); ?>" style="color: white">Return Manage Customer page</a></button><br>
        <br>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Admin/Customer/EditCustomer.blade.php ENDPATH**/ ?>