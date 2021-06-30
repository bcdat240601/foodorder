
<?php $__env->startSection('content'); ?>
<div class="container" style="margin-left: 100px">
    <h2 style="color: red">Edit Product:</h2>
    <form action="<?php echo e(route('food.edit')); ?>"  enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="id" value="<?php echo e($data->id); ?>" hidden>
        <br><p style="color: green">Product Name:</p><input type="text" name="FoodName" value="<?php echo e($data->FoodName); ?>"><br>
        <p style="color: green">Price:</p><input type="number" name="Price" value="<?php echo e($data->Price); ?>"> <br>
        <p style="color: green">Description:</p><textarea name="Description" id="" cols="80" rows="10" value="<?php echo e($data->Description); ?>"></textarea> 
        <p style="color: green">Quantity:</p><input type="number" name="Quantity" value="<?php echo e($data->Quantity); ?>"><br>
        <p style="color: green">Category ID:</p><select name="CategoryID" id="">
            <option value=2 <?php if($data->CategoryID==2): ?>selected <?php endif; ?>>Fresh Food</option>
            <option value=3 <?php if($data->CategoryID==3): ?>selected <?php endif; ?>>Meat</option>
            <option value=4 <?php if($data->CategoryID==4): ?>selected <?php endif; ?>>Fruit</option>
            <option value=5 <?php if($data->CategoryID==5): ?>selected <?php endif; ?>>Sea Food</option>
            <option value=6 <?php if($data->CategoryID==6): ?>selected <?php endif; ?>>Canner Food</option>
            <option value=7 <?php if($data->CategoryID==7): ?>selected <?php endif; ?>>Vegetables</option>
            <option value=8 <?php if($data->CategoryID==8): ?>selected <?php endif; ?>>Drinks</option>
        </select><br>      
        <br><img src="<?php echo e(asset('images/product-details/'. $data->Image_Name)); ?>" style="width: 100px; height: 100px;" alt="">
        <p style="color: green">Image_Name:</p><input type="file" name= "Image_Name" accept="image/png, image/jpeg"/><br>
        <br><input type="submit" value="Edit product" style="background-color: crimson; color: white"/>
        <button style="background-color: green;"><a href="<?php echo e(asset('admin/product/index')); ?>" style="color: white">Return Manage Product page</a></button><br>
        <br>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/admin/Product/edit.blade.php ENDPATH**/ ?>