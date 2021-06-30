
<?php $__env->startSection('content'); ?>
<div class="container">
    <table class="table table-bordered display" id="table_id">
        <br>
        <button style="background-color: crimson;"><a href="<?php echo e(asset('admin/category/addcategory')); ?>" style="color: white">Add New Category</a></button><br>
        <br>
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">CategoryName</td>
                <td style="color: white; background-color: orangered">Description</td>
                <td style="color: white; background-color: orangered">Status</td>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="color: green">
                    <?php echo e($item->id); ?>

                </td>
                <td style="color: black">
                    <?php echo e($item->CatagoryName); ?>

                </td>
                <td style="color: green">
                    <?php echo e($item->Description); ?>

                </td>
                <td>
                    <a href="<?php echo e(asset('admin/category/edit/'.$item->id)); ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/category/indexcategory.blade.php ENDPATH**/ ?>