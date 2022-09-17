<div class="form-group pb-3">
   <?php echo Form::label('title', 'Título:'); ?>

   <?php echo Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del exposicion']); ?>

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

   <?php if(isset($exposicion->image_url)): ?>
   <img class="w-100 aspect-video" id="picture" src="<?php echo e(Storage::url($exposicion->image_url)); ?>" alt="">
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
   <?php echo Form::label('content', 'Contenido:'); ?>

   <?php echo Form::textarea('content', null, ['class' => 'form-control']); ?>

   <?php $__errorArgs = ['content'];
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
   <?php echo Form::label('game_url', 'Código del juego de Scratch (opcional):'); ?>

   <?php echo Form::text('game_url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código de Scratch']); ?>

   <?php $__errorArgs = ['game_url'];
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
<?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/exposicion/partials/form.blade.php ENDPATH**/ ?>