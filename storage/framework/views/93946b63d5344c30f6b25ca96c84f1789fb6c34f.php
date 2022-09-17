<div class="form-group pb-3">
   <?php echo Form::label('title', 'Título:'); ?>

   <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del ruta']); ?>

   <?php $__errorArgs = ['title'];
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
   <div class="pb-2">
      <?php echo Form::label('file', 'Selecciona una imagen:'); ?>

      <?php echo Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => "loadPreview(this);"]); ?>

   </div>

   <?php if(isset($ruta->image_url)): ?>
      <img class="w-100 aspect-video" id="picture" src="<?php echo e(Storage::url($ruta->image_url)); ?>" alt="">
   <?php else: ?>
      <img class="w-100 aspect-video" id="picture" src="/img/placeholder.jpeg" alt="">
   <?php endif; ?>

   <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <br>
      <small class="text-danger"><?php echo e($message); ?></small>
   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group pb-3">
   <?php echo Form::label('exposicions', 'Exposiciones:'); ?>

   <div class="mt-n2 mb-2">
      <small>Seleccione las exposiciones que son parte de la ruta</small>
   </div>
   <?php $__currentLoopData = $exposicions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exposicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php echo Form::checkbox('exposicions[]', $exposicion->id, null); ?>

       <?php echo e($exposicion->title); ?>

       <br>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php $__errorArgs = ['exposicions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
       <div class="mt-3 alert alert-danger">
           <?php echo e($message); ?>

       </div>
   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group pb-3">
   <?php echo Form::label('description', 'Descripción:'); ?>

   <?php echo Form::textarea('description', null, ['class' => 'form-control']); ?>

   <?php $__errorArgs = ['description'];
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


<?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/ruta/partials/form.blade.php ENDPATH**/ ?>