<form action= "<?php echo e(asset('dangki')); ?>" method="POST">
<?php echo csrf_field(); ?>
UserName:<input type = "text" name="Name"> <br>
Phone:<input type = "text" name="Phonenumber"> <br>
Email:<input type = "text" name="Email"> <br>
Address:<input type = "text" name="Address"> <br>
<input type="Submit">
</form><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/form1.blade.php ENDPATH**/ ?>