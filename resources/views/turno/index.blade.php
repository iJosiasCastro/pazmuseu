@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div class="py-4"></div>
        <h3>Todos los turnos</h3>
        <div class="row">
            @foreach($turnos as $turno)

                <div class="col-6 p-2 p-md-3">
                    <div class="card bg-light p-2 p-md-4">
                        <div class="w-100">
                            <div class="text-left text-body">
                                <p><span class="font-weight-bold">Fecha: </span>{{date('d-m-Y', strtotime($turno->fecha))}}</p>
                                <p><span class="font-weight-bold">Hora: </span>{{date('h:ia' , strtotime($turno->hora))}}</p>
                                <p class="mb-0"><span class="font-weight-bold">Ruta: </span> {{$turno->ruta->title}}</p>
                            </div>
                            <div class="mt-4 text-body text-center">
                                <h5 class="font-weight-bold">Guía</h5>
                                <img class="rounded-circle" width="100px" height="100px" src="{{Storage::url($turno->guia->image_url)}}" alt="">
                                <div class="py-4">
                                    <p class="font-weight-bold h6">{{$turno->guia->name}}</p>
                                    <p class="h6">Idioma {{$turno->guia->idioma}}</p>
                                </div>
                            </div>
                            <a href="{{route('turno.inscripcion', $turno)}}" class="btn btn-primary w-100">INSCRIBIRME AL TURNO</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection