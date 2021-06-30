<form action="<?php echo e( route('upfile')); ?>" enctype="multipart/form-data" method="POST">
    <?php echo csrf_field(); ?>
            <input type="file" name="file" >
            <input type="submit" value="">
        </form><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Web/View.blade.php ENDPATH**/ ?>