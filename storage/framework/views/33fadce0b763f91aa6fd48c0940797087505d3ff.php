
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Add Category:</h2>
    <form action="<?php echo e(route('category.add')); ?>" enctype="multipart/form-data" method="POST">
    <?php echo csrf_field(); ?>
        <input type="text" name="CatagoryName">
        <input type="text" name="Description">
        <input type="submit">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Admin/Category/AddCategory.blade.php ENDPATH**/ ?>