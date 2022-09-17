

<?php $__env->startSection('content'); ?>
    <div class="col-md-6 mx-auto">
        <?php if(session('info')): ?>
            <div class="alert alert-success">
                <strong><?php echo e(session('info')); ?></strong>
            </div>
        <?php endif; ?>
        <div class="py-4"></div>
        <h3>Todos los turnos</h3>
        <div class="row">
            <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-6 p-2 p-md-3">
                    <div class="card bg-light p-2 p-md-4">
                        <div class="w-100">
                            <div class="text-left text-body">
                                <p><span class="font-weight-bold">Fecha: </span><?php echo e(date('d-m-Y', strtotime($turno->fecha))); ?></p>
                                <p><span class="font-weight-bold">Hora: </span><?php echo e(date('h:ia' , strtotime($turno->hora))); ?></p>
                                <p class="mb-0"><span class="font-weight-bold">Ruta: </span> <?php echo e($turno->ruta->title); ?></p>
                            </div>
                            <div class="mt-4 text-body text-center">
                                <h5 class="font-weight-bold">Guía</h5>
                                <img class="rounded-circle" width="100px" height="100px" src="<?php echo e(Storage::url($turno->guia->image_url)); ?>" alt="">
                                <div class="py-4">
                                    <p class="font-weight-bold h6"><?php echo e($turno->guia->name); ?></p>
                                    <p class="h6">Idioma <?php echo e($turno->guia->idioma); ?></p>
                                </div>
                            </div>
                            <a href="<?php echo e(route('turno.inscripcion', $turno)); ?>" class="btn btn-primary w-100">INSCRIBIRME AL TURNO</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/turno/index.blade.php ENDPATH**/ ?>