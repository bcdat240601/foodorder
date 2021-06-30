
<?php $__env->startSection('content'); ?>
<div class="container">
    <br>
        <button style="background-color: crimson;"><a href="<?php echo e(asset('admin/product/add')); ?>" style="color: white">Add New Product</a></button><br>
        <br>
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">FoodName</td>
                <td style="color: white; background-color: orangered">Price</td>
                <td style="color: white; background-color: orangered">Quantity</td>
                <td style="color: white; background-color: orangered">CategoryID</td>
                <td style="color: white; background-color: orangered">Image_Name</td>
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
                        <?php echo e($item->FoodName); ?>

                    </td>
                    <td style="color:gray">
                        <?php echo e($item->Price); ?>

                    </td>
                    <td style="color: orange">
                        <?php echo e($item->Quantity); ?>

                    </td>
                    <td style="color: green">
                        <?php echo e($item->CategoryID); ?>

                    </td>
                    <td>
                        <img src="<?php echo e(asset('images/product-details/'.$item->Image_Name)); ?>" alt="" style="width: 50px; height: 50px;">
                    </td>
                    <td>
                        <a href="<?php echo e(asset('admin/product/edit/'.$item->id)); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/product/index.blade.php ENDPATH**/ ?>