
<?php $__env->startSection('content'); ?>
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table" style="color: green">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item Product</th>  
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col"> Subtotal</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($data)): ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="row-<?php echo e($item->id); ?>">
                        <td style="color: black"><?php echo e($item->id); ?></td>
                        <th style="color: black"><?php echo e($item->name); ?></th>
                        <td style="color: black"><input type="number" data-id="<?php echo e($item->id); ?>" value="<?php echo e($item->quantity); ?>" class="quantities"></td>
                        <td style="color: black"><?php echo e($item->price); ?></td>
                        <td class="sub-total" id="sub-<?php echo e($item->id); ?>" style="color: black"> <?php echo e($item->getSubTotal()); ?></td>
                        <td><button class="btn-danger btn-del" data-id="<?php echo e($item->id); ?>">Delete</button></td>
                        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    
                </tbody>
            </table>
            <h1 style="float: right" >Total: <span id="total" style="color: red"></span></h1>
            
        </div>
    </div>
    
</section> <!--/#cart_items-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function tinh(){
            var len=document.getElementsByClassName("sub-total").length;
            var sum = 0;
            for(var i =0;i<len;i++)
            {
                var val=document.getElementsByClassName("sub-total").item(i).innerHTML;
                sum = sum + parseInt(val);
            }
            document.getElementById('total').innerText=sum;
        }
        $('.quantities').change(function(){
            if($(this).val()<=0)
            {
                $(this).val(1)
                
            }
            var val=$(this).val()
            var id=$(this).data('id')
            var id_sub="#sub-"+id;
            $.get('upquantity',{ id:id, sl:val },
                function(data){
                    $(id_sub).text(data)
            })
            tinh()
        })
        $('.btn-del').click(function(){
            var id = $(this).data('id');
            $.get('delitem',{id:id},function(data){
              alert(data)
            })
            $('#row-'+id).remove();
            tinh()
        })
        tinh()
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodorder\resources\views/web/Cart.blade.php ENDPATH**/ ?>