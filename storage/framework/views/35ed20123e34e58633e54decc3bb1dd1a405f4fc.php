

<?php $__env->startSection('content'); ?>
    <div class="col-md-8 mx-auto">
        <div class="py-4"></div>
        <?php if(session('info')): ?>
            <div class="alert alert-success mb-3">
                <strong><?php echo e(session('info')); ?></strong>
            </div>
        <?php endif; ?>
        <h1><?php echo e($exposicion->title); ?></h1>
        <img class="w-100" src="<?php echo e(Storage::url($exposicion->image_url)); ?>">
        <div class="py-4"></div>
        <h2 class="h3">Descripción</h2>
        <p><?php echo e($exposicion->content); ?></p>

        <?php if($exposicion->game_url): ?>
            <div class="py-4"></div>
            <h2 class="h3">Videojuego interactivo</h2>
            <iframe allowtransparency="true" width="100%" height="402" src="<?php echo e("https://scratch.mit.edu/projects/embed/".$exposicion->game_url."/?autostart=false"); ?>" frameborder="0" allowfullscreen></iframe>
        <?php endif; ?>



        <div class="py-5"></div>
        <h3 class="h4">Más exposiciones</h3>
        <div class="row">
            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exposicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                    <a href="<?php echo e(route('exposicion.show', $exposicion)); ?>"  class="bg-light card relative">
                        <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($exposicion->image_url)); ?>">
                        <div class="card-gradient p-2 w-100 absolute">
                            <h5 class="mb-0 text-light"><?php echo e($exposicion->title); ?></h5>
                        </div>
                        <div class="bg-primary card-line-bottom"></div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="py-5"></div>
        <div class="card bg-light">
            <div class="card-body">
                <h3 class="h4">Queremos conocer tus comentarios</h3>
                <p class="mb-3">Contanos como fue tu experiencia y como podemos seguir mejorando</p>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
        
                        <?php echo Form::open(['route' => ['valoracion', $exposicion], 'autocomplete' => 'off', 'files' => true]); ?>


                            <div class="form-group pb-3">
                                <?php echo Form::label('name', 'Nombre y apellido:'); ?>

                                <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre']); ?>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div class="form-group pb-3">
                                <?php echo Form::label('email', 'Email:'); ?>

                                <?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su email']); ?>

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
        
                            <div class="form-group pb-3">
                                <?php echo Form::label('message', 'Mensaje:'); ?>

                                <?php echo Form::textarea('message', null, ['class' => 'form-control']); ?>

                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
        
                            <?php echo Form::submit('Enviar valoracion', ['class' => 'btn btn-primary']); ?>

        
        
                        <?php echo Form::close(); ?>

            
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/exposicion/show.blade.php ENDPATH**/ ?>