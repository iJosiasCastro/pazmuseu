<div class="form-group pb-3">
   <?php echo Form::label('name', 'Nombre y apellido:'); ?>

   <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre y apellido del guia']); ?>

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

   <?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del guia']); ?>

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
   <?php echo Form::label('idioma', 'Selecciona un idioma:'); ?>

   <?php echo Form::select('idioma', ['español' => 'Español', 'portugués' => 'Portugués', 'inglés' => 'Inglés', 'alemán' => 'Alemán', 'italiano' => 'Italiano', 'chino' => 'Chino'], null, ['class' => 'form-control', ]); ?>

   <?php $__errorArgs = ['idioma'];
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

   <?php if(isset($guia->image_url)): ?>
   <img class="w-100 aspect-video" id="picture" src="<?php echo e(Storage::url($guia->image_url)); ?>" alt="">
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
</div><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/guia/partials/form.blade.php ENDPATH**/ ?>