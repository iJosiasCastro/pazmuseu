<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>
    <?php echo $__env->yieldContent('css'); ?>

    <div id="app">
        <div class="">
            <nav class="navbar navbar-light navbar-expand-lg pl-lg-5 pl-md-3 pr-lg-5 pr-md-3">
                <a href="/" class="align-items-center align-items-sm-center d-flex navbar-brand">
                    <img src="/img/logo.png" height="50px" class="mr-2"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse ml-auto navbar-collapse" id="navbarSupportedContent">
                    <ul class="ml-auto navbar-nav text-center">
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/turnos">Turnos</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/rutas">Rutas</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link text-dark rounded-pill px-3 mx-2" href="/exposiciones">Exposiciones</a>
                        </li>
                        <li class="active nav-item">
                            <a class="font-weight-bold nav-link bg-primary text-white rounded-pill px-3 mx-2" href="/pazmuseu.apk">Descargar app</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <slot></slot>
        </div>
        

        <main class="">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <div>
            <footer>
                <div class="spacer-lg"></div>
                <nav class="bg-secondary d-flex d-sm-flex flex-column flex-sm-row navbar navbar-dark pl-lg-5 pl-md-3 pr-lg-5 pr-md-3" data-pgc-define="footer" data-pgc-define-name="footer">
                    <a to="/" class="align-items-center align-items-sm-center d-flex navbar-brand">
                        <img src="/img/logo.png" height="50px" class="mr-2"/>
                    </a>
                    <div id="navbarSupportedContent" class="ml-0 ml-sm-auto">
                        <ul class="ml-auto navbar-nav text-center">
                            <li class="active nav-item">
                                <?php if(Auth::check()): ?>
                                    <a class="font-weight-bold nav-link text-dark" href="/administrar">Administrar</a>
                                <?php else: ?>
                                    <a class="font-weight-bold nav-link text-dark" href="/ingresar">Ingresar</a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </footer>
        </div>
    </div>
    
    <?php echo $__env->yieldContent('js'); ?>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/252250494d.js" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/layouts/app.blade.php ENDPATH**/ ?>