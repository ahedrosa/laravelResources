<?php $__env->startSection('content'); ?>
<?php if(old('id') != ''): ?>
    <div class="alert alert-danger" role="alert">
        No se ha editado el elemento con exito.
    </div>
<?php endif; ?>
<div class="col-lg-8 col-md-8 mx-auto">
      <h1 class="fw-light">Resources</h1>
      <p class="lead text-muted">Edit Resource</p>
</div>
</br>
<div class="col-lg-8 col-md-8 mx-auto"> 
    <form action="<?php echo e(url('resources/' . $resource['id'])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>
            <input value="<?php echo e(old('id')); ?>" type="number" name="id" placeholder="#id positive integer" min="1" step="1" required />
            <input value="<?php echo e(old('name')); ?>" type="text" name="name" placeholder="Subject's name" min-length="5" max-length="30" required />
            <input value="<?php echo e(old('age')); ?>" type="number" name="age" placeholder="Subject's age" min="1" step="1" required />
        <input type="submit" value="Edit"/>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laraveles/resourcesApp/resources/views/resources/edit.blade.php ENDPATH**/ ?>