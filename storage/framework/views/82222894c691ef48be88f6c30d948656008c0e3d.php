

<?php $__env->startSection('content'); ?>
    <div class="col-md-8 mx-auto">
        <div class="py-4"></div>
        <h1><?php echo e($ruta->title); ?></h1>
        <img class="w-100" src="<?php echo e(Storage::url($ruta->image_url)); ?>">
        <div class="py-4"></div>
        <h2 class="h3">Exposiciones</h2>
        <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Imagen</th>
                <th scope="col"></th>
              </tr>
            </thead>
            
            <tbody>
                <?php $__currentLoopData = $ruta->exposicions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exposicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($exposicion->title); ?></td>
                    <td>
                        <img class="align-items-start d-flex flex-column justify-content-end" height="100px" src="<?php echo e(Storage::url($exposicion->image_url)); ?>">
                    </td>
                    <td><a href="<?php echo e(route('exposicion.show', $exposicion)); ?>" class="btn btn-primary">Visitar</a></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        <div class="py-4"></div>

        <h2 class="h3">Descripción</h2>
        <p><?php echo e($exposicion->content); ?></p>


        <div class="py-5"></div>
        <h3 class="h4">Más rutas</h3>
        <div class="row">
            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                    <a href="<?php echo e(route('exposicion.show', $ruta)); ?>"  class="bg-light card relative">
                        <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($ruta->image_url)); ?>">
                        <div class="card-gradient p-2 w-100 absolute">
                            <h5 class="mb-0 text-light"><?php echo e($ruta->title); ?></h5>
                        </div>
                        <div class="bg-primary card-line-bottom"></div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/ruta/show.blade.php ENDPATH**/ ?>