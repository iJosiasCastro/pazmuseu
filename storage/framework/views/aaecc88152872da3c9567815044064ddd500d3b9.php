<?php $__env->startComponent('mail::message'); ?>
# Hola <?php echo e($data['inscripcion']->name); ?>!

Fue confirmada su inscripción al turno de la ruta "<?php echo e($data['turno']->ruta->title); ?>" que será llevado a cabo el día <?php echo e(date('d-m-Y', strtotime($data['turno']->fecha))); ?> a las <?php echo e(date('h:ia' , strtotime($data['turno']->hora))); ?>. ¡No se olvidé de asitir, le esperamos!

<?php $__env->startComponent('mail::button', ['url' => 'http://192.168.0.186:8080/']); ?>
Visitar museo virtual
<?php echo $__env->renderComponent(); ?>

Gracias,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>   
<?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/emails/confimacion.blade.php ENDPATH**/ ?>