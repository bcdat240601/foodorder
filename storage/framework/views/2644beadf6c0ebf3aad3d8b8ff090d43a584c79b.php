
<?php $__env->startSection('content'); ?>

    <div class="container" style="margin-left: 100px">
        <h2 style="color: red">Add Product:</h2>
    <form action="<?php echo e(route("food.add")); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <br><p style="color: green">Product Name:</p><input type="text" name= "FoodName"/><br>
        <p style="color: green">Price: </p><input type="number" name= "Price"/><br>
        <p style="color: green">Description: </p>
        <textarea name="Description" id="" cols="80" rows="10"></textarea> 
        <p style="color: green">Quantity: </p><input type="number" name= "Quantity"/><br>
        <p style="color: green">Image_Name:</p><input type="file" name= "Image_Name" accept="image/png, image/jpeg"/><br>
        <p style="color: green">Category ID:</p><select name="CategoryID" id="">
            <option value=2>Fresh Food</option>
            <option value=3>Meat</option>
            <option value=4>Fruit</option>
            <option value=5>Sea Food</option>
            <option value=6>Canner Food</option>
            <option value=7>Vegetables</option>
            <option value=8>Drinks</option>
        </select><br> 
        <br><input type="submit" value="Add product" style="background-color: crimson; color: white" />   
    </form>  
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/Product/add.blade.php ENDPATH**/ ?>