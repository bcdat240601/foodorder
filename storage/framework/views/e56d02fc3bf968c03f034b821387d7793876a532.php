
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Category:</h2>
    <form action="<?php echo e(route("category.edit")); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <br><p style="color: green">ID:</p><input type="text" name="id" value="<?php echo e($data->id); ?>"/><br>
        <p style="color: green">Catagory Name:</p><input type="text"  name="CatagoryName" value="<?php echo e($data->CatagoryName); ?>"/><br>
        <p style="color: green">Description:</p><input type="text" name="Description" value="<?php echo e($data->Description); ?>"/><br>
        <br><input type="submit" value="Edit Category" style="background-color: crimson; color: white"/>
        <button style="background-color: green;"><a href="<?php echo e(asset('admin/category/indexcategory')); ?>" style="color: white">Return Manage Category page</a></button><br>
        <br>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Admin/Category/EditCategory.blade.php ENDPATH**/ ?>