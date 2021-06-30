
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Add Category:</h2>
    <form action="<?php echo e(route('category.add')); ?>" enctype="multipart/form-data" method="POST">
    <?php echo csrf_field(); ?>
    <br><p style="color: green">Category Name:</p><input type="text" name="CatagoryName"/><br>
        <p style="color: green">Description:</p>
        <textarea name="Description" id="" cols="80" rows="10"></textarea><br>
    <br><input type="submit" value="Add category" style="background-color: crimson; color: white; width: 150px;"/>
        <button style="background-color: green;"><a href="<?php echo e(asset('admin/category/indexcategory')); ?>" style="color: white">Return Manage Category page</a></button><br>
        <br>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/category/AddCategory.blade.php ENDPATH**/ ?>