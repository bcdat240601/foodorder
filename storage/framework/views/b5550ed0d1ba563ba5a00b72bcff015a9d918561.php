
<?php $__env->startSection('content'); ?>
<div class="container">
    <table class="table table-bordered display" id="table_id">
        <thead>
            <tr>
                <td style="color: white; background-color: orangered">ID</td>
                <td style="color: white; background-color: orangered">CustomerName</td>
                <td style="color: white; background-color: orangered">Address</td>
                <td style="color: white; background-color: orangered">Phone</td>
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
                        <?php echo e($item->CustomerName); ?>

                    </td>
                    <td style="color: gray">
                        <?php echo e($item->Address); ?>

                    </td>
                    <td style="color: orange">
                        <?php echo e($item->Phone); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(asset('admin/customer/edit/'.$item->id)); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/customer/indexcustomer.blade.php ENDPATH**/ ?>