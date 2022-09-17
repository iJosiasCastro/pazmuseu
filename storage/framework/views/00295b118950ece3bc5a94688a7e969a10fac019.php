<?php $__env->startSection('content'); ?>
<div class="">
    <div class="">
        <div class="d-flex row m-0 inicio-background">
            <div class="col-12 col-md-4 py-5 pl-md-5 mr-n5">
                <div class="py-md-5">
                    <div class="py-md-5">
                        <div class="h1 font-weight-bold">
                            DESCUBRÍ MÁS EXPOSICIONES EN NUESTRA APP
                        </div>
                        <p class="text-muted py-2">Disponible para teléfonos Android</p>
                        <div class="mt-2">
                            <a class="font-weight-bold btn btn-primary text-white rounded-pill" href="/pazmuseu.apk">Descargar app</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-block col-12 col-md-8">
                <div class="inicio-phone"></div>
            </div>
        </div>

        <div class="text-center col-md-8 mx-auto">
            <div class="py-5 my-md-5"></div>
            <h3>Algunas exposiciones</h3>
            <div class="row">

                <?php $__currentLoopData = $exposicions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exposicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <a href="/exposiciones" class="btn btn-primary">Ver todas</a>
        </div>

        <div class="py-5 my-md-5"></div>
        <div class="text-center mx-auto">
            <div class="top-decoration"></div>
            <div class="py-md-3"></div>
            <div class="width-800">
                <h3 class="font-weight-bold">Disponible la aplicación para descargar en Android</h3>
                <p>Descarga la aplicación para tu teléfono móvil y conéctate a nuestros
                BeepCons, donde vas a conseguir seguir una a una todas las exposiciones</p>
                <div class="py-3"></div>
                <div class="btn btn-dark">
                    <div class="d-flex">
                        <img height="45px" src="/img/dowload-button.png" alt="">
                        <a href="/pazmuseu.apk" class="text-left text-white pl-3">
                            Descargar para <br> dispositivos android
                        </a>
                    </div>
                </div>
            </div>
            <div class="py-5"></div>


        </div>

        <div class="text-center col-md-8 mx-auto">
            <div class="py-5"></div>
            <h3>Algunas rutas</h3>
            <div class="row">

                <?php $__currentLoopData = $rutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                        <a href="<?php echo e(route('ruta.show', $ruta)); ?>"  class="bg-light card relative">
                            <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($ruta->image_url)); ?>">
                            <div class="card-gradient p-2 w-100 absolute">
                                <h5 class="mb-0 text-light"><?php echo e($ruta->title); ?></h5>
                            </div>
                            <div class="bg-primary card-line-bottom"></div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <div class="py-5"></div>


        <div class="text-center col-md-8 mx-auto">
            <div class="py-5"></div>
            <h3>Proximos turnos</h3>
            <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
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
                            <a href="<?php echo e(route('turno.inscripcion', $turno)); ?>" class="btn btn-primary w-100">INSCRIBIRME AL TURNO</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="py-4"></div>
        <div>
            <div class="py-5"></div>
            <div class="text-center col-md-6 mx-auto">
                <h3 class="font-weight-bold h3">¿Cual es nuestro objetivo?</h3>
                <div class="mb-3">
                    <img class="rounded-circle" width="200px" height="200px" src="/img/pazmuseo-fondoazul.png" alt="">
                </div>
                <p>Por nuestra oferta de cabañas, casas, departamentos, inmuebles rurales, locales, lotes, terrenos en toda la cuenca carbonífera: Río Turbio, 28 de Noviembre, Julia Dufour, Turbio Viejo, asi como también en El Calafate, Río Gallegos y el toda la provincia de Santa Cruz. También por nuestra seriedad, confianza y asesoramiento a la hora de vender su propiedad o planificar su desarrollo o loteo.</p>
            </div>

        </div>

        <div class="py-4"></div>




       
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/home.blade.php ENDPATH**/ ?>