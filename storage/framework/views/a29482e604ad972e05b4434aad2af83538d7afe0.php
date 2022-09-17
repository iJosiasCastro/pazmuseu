

<?php $__env->startSection('content'); ?>
<div class="py-3"></div>
<div class="col-md-6 mx-auto">
   <div class="card">
      <div class="card-body">
         <?php echo Form::open(['route' => 'ruta.store', 'autocomplete' => 'off', 'files' => true]); ?>


            <?php echo $__env->make('ruta.partials.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::submit('Crear ruta', ['class' => 'btn btn-primary']); ?>



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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/ruta/create.blade.php ENDPATH**/ ?>