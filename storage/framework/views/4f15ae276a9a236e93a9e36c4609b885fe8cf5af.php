<form action="<?php echo e(asset('tong')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="Number" name="a"/>
    <input type="Number" name="b"/>
    <input type="submit"/>
</form>

<?php /**PATH C:\xampp\htdocs\foodorder\resources\views/Web/Tong.blade.php ENDPATH**/ ?>