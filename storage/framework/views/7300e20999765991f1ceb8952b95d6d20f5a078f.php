

<?php $__env->startSection('content'); ?>
<div class="col-md-6 mx-auto">
   <div class="py-4"></div>
   <?php if(session('info')): ?>
        <div class="alert alert-success">
            <strong><?php echo e(session('info')); ?></strong>
        </div>
    <?php endif; ?>
   <div class="card">
      <div class="card-body">
        <h2 class="h3">Inscripciones</h2>
        <div class="pb-3">
           <p>Ruta: "<?php echo e($turno->ruta->title); ?>"</p>
           <p>Fecha:  <?php echo e(date('d-m-Y', strtotime($turno->fecha))); ?></p>
           <p>Hora:  <?php echo e(date('h:ia' , strtotime($turno->hora))); ?></p>
         </div>

         <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th scope="col">Nombre y apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Confirmada</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            
            <tbody>
                <?php $__currentLoopData = $turno->inscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($inscripcion->name); ?></td>
                    <td><?php echo e($inscripcion->email); ?></td>
                    <td class="font-weight-bold">
                     <?php if($inscripcion->confirmada): ?>
                        <span class="text-success">
                           Confirmada
                        </span>
                     <?php else: ?>
                        <span class="text-danger">
                           Sin confirmar
                        </span>
                     <?php endif; ?>
                     </td>
                    <td>
                        <?php if(!$inscripcion->confirmada): ?>
                        <form action="<?php echo e(route('turno.inscripcion.confirmar', [$turno, $inscripcion])); ?>" method="POST">
                           <?php echo csrf_field(); ?>
                           <button type="submit" class="btn btn-primary mb-2">
                              Confirmar
                           </button>
                        </form>
                        <form action="<?php echo e(route('turno.inscripcion.eliminar', [$turno, $inscripcion])); ?>" method="POST">
                           <?php echo csrf_field(); ?>
                           <?php echo method_field('DELETE'); ?>
                           <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/turno/inscripciones.blade.php ENDPATH**/ ?>