<div class="form-group pb-3">
   <?php echo Form::label('fecha', 'Fecha:'); ?>

   <?php echo Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del turno']); ?>

   <?php $__errorArgs = ['fecha'];
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
   <?php echo Form::label('hora', 'Hora:'); ?>

   <?php echo Form::time('hora', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del turno']); ?>

   <?php $__errorArgs = ['hora'];
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
   <?php echo Form::label('ruta_id', 'Seleccione la ruta:'); ?>

   <?php echo Form::select('ruta_id', $rutas, null, ['class' => 'form-control', ]); ?>

   <?php $__errorArgs = ['ruta_id'];
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
   <?php echo Form::label('guia_id', 'Seleccione el guía:'); ?>

   <?php echo Form::select('guia_id', $guias, null, ['class' => 'form-control', ]); ?>

   <?php $__errorArgs = ['guia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <small class="text-danger"><?php echo e($message); ?></small>
   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/turno/partials/form.blade.php ENDPATH**/ ?>