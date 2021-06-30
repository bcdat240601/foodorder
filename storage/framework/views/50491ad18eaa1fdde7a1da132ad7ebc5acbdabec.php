<form action="<?php echo e(route('upfile')); ?>" method="POST" enctype="multipart/form-data" >
 <?php echo csrf_field(); ?>
    <input type="file" name="file">
    <input type="submit">
</form><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Web/Up.blade.php ENDPATH**/ ?>