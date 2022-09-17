

<?php $__env->startSection('content'); ?>
<div class="col-md-6 mx-auto">
    <?php if(session('info')): ?>
        <div class="alert alert-success">
            <strong><?php echo e(session('info')); ?></strong>
        </div>
    <?php endif; ?>
    
    <div class="py-4"></div>
    <h3>Exposiciones</h3>
    <a href="<?php echo e(route('exposicion.create')); ?>"  class="btn btn-primary btn-block mb-4">
        Crear nueva exposicion
    </a>
    <div class="row">
        <?php $__currentLoopData = $exposicions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exposicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="expo<?php echo e('#'.$exposicion->slug); ?>">Eliminar</button>
                <a href="<?php echo e(route('exposicion.edit', $exposicion)); ?>" class="btn btn-primary w-100">Editar</a>
                <a href="<?php echo e(route('exposicion.show', $exposicion)); ?>" class="bg-light card relative">
                    <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($exposicion->image_url)); ?>">
                    <div class="card-gradient p-2 w-100 absolute">
                        <h5 class="mb-0 text-light"><?php echo e($exposicion->title); ?></h5>
                    </div>
                    <div class="bg-primary card-line-bottom"></div>
                </a>
            </div>

        <div class="modal fade" id="expo<?php echo e($exposicion->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar la exposicion?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Una vez que eliminé la exposición no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <form action="<?php echo e(route('exposicion.destroy', $exposicion)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="py-4"></div>
    <h3>Rutas</h3>
    <a href="<?php echo e(route('ruta.create')); ?>"  class="btn btn-primary btn-block mb-4">
        Crear nueva ruta
    </a>
    <div class="row">
        <?php $__currentLoopData = $rutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="<?php echo e('#ruta'.$ruta->slug); ?>">Eliminar</button>
                <a href="<?php echo e(route('ruta.edit', $ruta)); ?>" class="btn btn-primary w-100">Editar</a>
                <a href="<?php echo e(route('ruta.show', $ruta)); ?>" class="bg-light card relative">
                    <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($ruta->image_url)); ?>">
                    <div class="card-gradient p-2 w-100 absolute">
                        <h5 class="mb-0 text-light"><?php echo e($ruta->title); ?></h5>
                    </div>
                    <div class="bg-primary card-line-bottom"></div>
                </a>
            </div>

        <div class="modal fade" id="ruta<?php echo e($ruta->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar la ruta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Una vez que eliminé la ruta no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <form action="<?php echo e(route('ruta.destroy', $ruta)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="py-4"></div>
    <h3>Guia</h3>
    <a href="<?php echo e(route('guia.create')); ?>"  class="btn btn-primary btn-block mb-4">
        Crear nueva guia
    </a>
    <div class="row">
        <?php $__currentLoopData = $guias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="<?php echo e('#guia'.$guia->slug); ?>">Eliminar</button>
                <a href="<?php echo e(route('guia.edit', $guia)); ?>" class="btn btn-primary w-100">Editar</a>
                <div class="card bg-light p-2 p-md-4">
                    <div class="w-100">
                        <div class="mt-4 text-body text-center">
                            <h5 class="font-weight-bold"><?php echo e($guia->name); ?></h5>
                            <img class="rounded-circle" width="100px" height="100px" src="<?php echo e(Storage::url($guia->image_url)); ?>" alt="">
                            <div class="py-4">
                                <p class="h6">Idioma <?php echo e($guia->idioma); ?></p>
                                <p class="mt-3">Email: <?php echo e($guia->email); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="guia<?php echo e($guia->slug); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar el guía?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Una vez que eliminé el guía no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <form action="<?php echo e(route('guia.destroy', $guia)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="py-4"></div>
    <h3>Turno</h3>
    <a href="<?php echo e(route('turno.create')); ?>"  class="btn btn-primary btn-block mb-4">
        Crear nueva turno
    </a>
    <div class="row">
        <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="<?php echo e('#turno'.$turno['turno']->id); ?>">Eliminar</button>
                <a href="<?php echo e(route('turno.edit', $turno)); ?>" class="btn btn-primary w-100">Editar</a>
                <div class="card bg-light p-2 p-md-4">
                    <div class="w-100">
                        <div class="text-left text-body">
                            <p><span class="font-weight-bold">Fecha: </span><?php echo e(date('d-m-Y', strtotime($turno['turno']->fecha))); ?></p>
                            <p><span class="font-weight-bold">Hora: </span><?php echo e(date('h:ia' , strtotime($turno['turno']->hora))); ?></p>
                            <p class="mb-0"><span class="font-weight-bold">Ruta: </span> <?php echo e($turno['turno']->ruta->title); ?></p>
                        </div>
                        <div class="mt-4 text-body text-center">
                            <h5 class="font-weight-bold">Guía</h5>
                            <img class="rounded-circle" width="100px" height="100px" src="<?php echo e(Storage::url($turno['turno']->guia->image_url)); ?>" alt="">
                            <div class="py-4">
                                <p class="font-weight-bold h6"><?php echo e($turno['turno']->guia->name); ?></p>
                                <p class="h6">Idioma <?php echo e($turno['turno']->guia->idioma); ?></p>
                            </div>
                        </div>
                        <?php echo e($turno['turno']->inscripcionesPendiente); ?>

                        <?php if($turno['pendientes']): ?>
                            <a href="<?php echo e(route('turno.inscripciones', $turno['turno'])); ?>" class="btn btn-warning">
                                Inscripciones pendientes
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('turno.inscripciones', $turno['turno'])); ?>" class="btn btn-primary">
                                Inscripciones
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>