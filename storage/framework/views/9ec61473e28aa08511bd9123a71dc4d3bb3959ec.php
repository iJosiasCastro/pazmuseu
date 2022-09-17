

<?php $__env->startSection('content'); ?>
<div class="py-3"></div>
<div class="col-md-6 mx-auto">
   <div class="card">
      <div class="card-body">
         <?php echo Form::open(['route' => ['turno.inscribirse', $turno], 'autocomplete' => 'off', 'files' => true]); ?>


         
            <div class="form-group pb-3">
                <?php echo Form::label('name', 'Nombre y apellido:'); ?>

                <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre y apellido']); ?>

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
                <label for="">Turno seleccionado:</label>
                <div class="col-12 m-0 p-0">
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
                        </div>
                    </div>
                </div>
            </div>
            
            <?php echo Form::submit('Inscribirse al turno', ['class' => 'btn btn-primary']); ?>



        <?php echo Form::close(); ?>

      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
   <style>
      .image-wrapper{
         position: relative;
         padding-bottom: 56.25%;

      }

      .image-wrapper{
         position: absolute;
         object-fit: cover;
         width: 100%;
         height: 100%;
      }


      .ck {
         height: 300px;
      }

   </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
   <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
   <script>

      document.getElementById('file').addEventListener('change', cambiarImagen);

      function cambiarImagen(){
         console.log('red')
         var file = event.target.files[0];
         var reader = new FileReader();
         
         reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result);
         };

         reader.readAsDataURL(file);
      }

      function loadPreview(input, id) {
         console.log('hello')
         
         id = id || '#picture';
         if (input.files && input.files[0]) {
            var reader = new FileReader();
      
            reader.onload = function (e) {
                  $(id)
                        .attr('src', e.target.result)
            };
      
            reader.readAsDataURL(input.files[0]);
         }
      }
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/turno/inscripcion.blade.php ENDPATH**/ ?>