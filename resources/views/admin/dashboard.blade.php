@extends('layouts.app')

@section('content')
<div class="col-md-6 mx-auto">
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="py-4"></div>
    <h3>Exposiciones</h3>
    <a href="{{route('exposicion.create')}}"  class="btn btn-primary btn-block mb-4">
        Crear nueva exposicion
    </a>
    <div class="row">
        @foreach($exposicions as $exposicion)
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="{{'#expo'.$exposicion->slug}}">Eliminar</button>
                <a href="{{route('exposicion.edit', $exposicion)}}" class="btn btn-primary w-100">Editar</a>
                <a href="{{route('exposicion.show', $exposicion)}}" class="bg-light card relative">
                    <img class="align-items-start card-img d-flex flex-column justify-content-end" src="{{Storage::url($exposicion->image_url)}}">
                    <div class="card-gradient p-2 w-100 absolute">
                        <h5 class="mb-0 text-light">{{$exposicion->title}}</h5>
                    </div>
                    <div class="bg-primary card-line-bottom"></div>
                </a>
            </div>

        <div class="modal fade" id="expo{{$exposicion->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar la exposicion?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Una vez que eliminé la exposición no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <form action="{{route('exposicion.destroy', $exposicion)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="py-4"></div>
    <h3>Rutas</h3>
    <a href="{{route('ruta.create')}}"  class="btn btn-primary btn-block mb-4">
        Crear nueva ruta
    </a>
    <div class="row">
        @foreach($rutas as $ruta)
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="{{'#ruta'.$ruta->slug}}">Eliminar</button>
                <a href="{{route('ruta.edit', $ruta)}}" class="btn btn-primary w-100">Editar</a>
                <a href="{{route('ruta.show', $ruta)}}" class="bg-light card relative">
                    <img class="align-items-start card-img d-flex flex-column justify-content-end" src="{{Storage::url($ruta->image_url)}}">
                    <div class="card-gradient p-2 w-100 absolute">
                        <h5 class="mb-0 text-light">{{$ruta->title}}</h5>
                    </div>
                    <div class="bg-primary card-line-bottom"></div>
                </a>
            </div>

        <div class="modal fade" id="ruta{{$ruta->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar la ruta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Una vez que eliminé la ruta no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                        <form action="{{route('ruta.destroy', $ruta)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="py-4"></div>
    <h3>Guia</h3>
    <a href="{{route('guia.create')}}"  class="btn btn-primary btn-block mb-4">
        Crear nueva guia
    </a>
    <div class="row">
        @foreach($guias as $guia)
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="{{'#guia'.$guia->slug}}">Eliminar</button>
                <a href="{{route('guia.edit', $guia)}}" class="btn btn-primary w-100">Editar</a>
                <div class="card bg-light p-2 p-md-4">
                    <div class="w-100">
                        <div class="mt-4 text-body text-center">
                            <h5 class="font-weight-bold">{{$guia->name}}</h5>
                            <img class="rounded-circle" width="100px" height="100px" src="{{Storage::url($guia->image_url)}}" alt="">
                            <div class="py-4">
                                <p class="h6">Idioma {{$guia->idioma}}</p>
                                <p class="mt-3">Email: {{$guia->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="guia{{$guia->slug}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Realmente desea eliminar el guía?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        Una vez que eliminé el guía no podrá restaurar los cambios, ¿Esta seguro que desea hacerlo?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            <form action="{{route('guia.destroy', $guia)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="py-4"></div>
    <h3>Turno</h3>
    <a href="{{route('turno.create')}}"  class="btn btn-primary btn-block mb-4">
        Crear nueva turno
    </a>
    <div class="row">
        @foreach($turnos as $turno)
            <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                <button class="btn btn-danger w-100" data-toggle="modal" data-target="{{'#turno'.$turno['turno']->id}}">Eliminar</button>
                <a href="{{route('turno.edit', $turno)}}" class="btn btn-primary w-100">Editar</a>
                <div class="card bg-light p-2 p-md-4">
                    <div class="w-100">
                        <div class="text-left text-body">
                            <p><span class="font-weight-bold">Fecha: </span>{{date('d-m-Y', strtotime($turno['turno']->fecha))}}</p>
                            <p><span class="font-weight-bold">Hora: </span>{{date('h:ia' , strtotime($turno['turno']->hora))}}</p>
                            <p class="mb-0"><span class="font-weight-bold">Ruta: </span> {{$turno['turno']->ruta->title}}</p>
                        </div>
                        <div class="mt-4 text-body text-center">
                            <h5 class="font-weight-bold">Guía</h5>
                            <img class="rounded-circle" width="100px" height="100px" src="{{Storage::url($turno['turno']->guia->image_url)}}" alt="">
                            <div class="py-4">
                                <p class="font-weight-bold h6">{{$turno['turno']->guia->name}}</p>
                                <p class="h6">Idioma {{$turno['turno']->guia->idioma}}</p>
                            </div>
                        </div>
                        {{$turno['turno']->inscripcionesPendiente}}
                        @if($turno['pendientes'])
                            <a href="{{route('turno.inscripciones', $turno['turno'])}}" class="btn btn-warning">
                                Inscripciones pendientes
                            </a>
                        @else
                            <a href="{{route('turno.inscripciones', $turno['turno'])}}" class="btn btn-primary">
                                Inscripciones
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
</div>
@endsection