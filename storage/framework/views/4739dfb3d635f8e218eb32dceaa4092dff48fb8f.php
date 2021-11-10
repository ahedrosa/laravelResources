<?php $__env->startSection('content'); ?>
    
  <!--Delete alert -->
    <div class="modal" id="modalDelete" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Confirm delete?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="modalDeleteResourceForm" action="" method="post">
                <?php echo method_field('delete'); ?>
                <?php echo csrf_field(); ?>
                <input type="submit" class="btn btn-primary" value="Delete resource"/>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Delete alert-->

<!--Message from resource controller-->
    <?php if(isset($message)): ?>
    <div class="alert alert-<?php echo e(($data['type']) ?? 'success'); ?>" role="alert">
        <?php echo e($message); ?>

    </div>
    <?php endif; ?>

    <div class="col-lg-8 col-md-8 mx-auto">
      <h1 class="fw-light">Resources</h1>
      <p class="lead text-muted">All our resources HERE</p>
      <!--<p>-->
      <!--  <a href="<?php echo e(url ('resources')); ?>" class="btn btn-primary my-2">Resources</a>-->
      <!--  <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
      <!--</p>-->
    </div>
    
<!--Message from resource controller-->
  <div class="col-lg-8 col-md-8 mx-auto">  
    <table class="table table-striped">
      <thead>
          <tr>
              <th scope="col"># id</th>
              <th scope="col">name</th>
              <th scope="col">age</th>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td>
                      <?php echo e($resource['id']); ?>

                  </td>
                  <td>
                      <?php echo e($resource['name']); ?>

                  </td>
                  <td>
                      <?php echo e($resource['age']); ?>

                  </td>
                  <td>
                      <a href="<?php echo e(route('resources.edit', $resource['id'])); ?>">edit</a>
                  </td>
                  <td>
                      <form class="deleteForm" action="<?php echo e(url('resources/' . $resource['id'])); ?>" method="post">
                          <?php echo method_field('delete'); ?>
                          <?php echo csrf_field(); ?>
                          <input type="submit" value="delete"/>
                      </form>
                  </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
    <div class="col-lg-8 col-md-8 mx-auto">
        <p>
          <a href="<?php echo e(url('resources/create')); ?>" class="btn btn-primary my-2" type="button">Add new resource</a>
          <a href="<?php echo e(url('resources/flush/all')); ?>" class="btn btn-danger my-2" type="button">Delete ALL resource</a>
        </p>
    </div>
    <form id="deleteResourceForm" action="" method="post">
        <?php echo method_field('delete'); ?>
        <?php echo csrf_field(); ?>
    </form>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!--js necesario para mostral el mensaje del delete-->
<script src="<?php echo e(url('assets/js/delete.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laraveles/resourcesApp/resources/views/resources/index.blade.php ENDPATH**/ ?>