@extends('layouts.app')

@section('content')
    <div class="col-md-8 mx-auto">
        <div class="py-4"></div>
        @if (session('info'))
            <div class="alert alert-success mb-3">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <h1>{{$exposicion->title}}</h1>
        <img class="w-100" src="{{Storage::url($exposicion->image_url)}}">
        <div class="py-4"></div>
        <h2 class="h3">Descripción</h2>
        <p>{{$exposicion->content}}</p>

        @if ($exposicion->game_url)
            <div class="py-4"></div>
            <h2 class="h3">Videojuego interactivo</h2>
            <iframe allowtransparency="true" width="100%" height="402" src="{{"https://scratch.mit.edu/projects/embed/".$exposicion->game_url."/?autostart=false"}}" frameborder="0" allowfullscreen></iframe>
        @endif



        <div class="py-5"></div>
        <h3 class="h4">Más exposiciones</h3>
        <div class="row">
            @foreach($related as $exposicion)
                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                    <a href="{{route('exposicion.show', $exposicion)}}"  class="bg-light card relative">
                        <img class="align-items-start card-img d-flex flex-column justify-content-end" src="{{Storage::url($exposicion->image_url)}}">
                        <div class="card-gradient p-2 w-100 absolute">
                            <h5 class="mb-0 text-light">{{$exposicion->title}}</h5>
                        </div>
                        <div class="bg-primary card-line-bottom"></div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="py-5"></div>
        <div class="card bg-light">
            <div class="card-body">
                <h3 class="h4">Queremos conocer tus comentarios</h3>
                <p class="mb-3">Contanos como fue tu experiencia y como podemos seguir mejorando</p>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
        
                        {!! Form::open(['route' => ['valoracion', $exposicion], 'autocomplete' => 'off', 'files' => true]) !!}

                            <div class="form-group pb-3">
                                {!! Form::label('name', 'Nombre y apellido:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre']) !!}
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group pb-3">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su email']) !!}
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
        
                            <div class="form-group pb-3">
                                {!! Form::label('message', 'Mensaje:') !!}
                                {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                                @error('message')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
        
                            {!! Form::submit('Enviar valoracion', ['class' => 'btn btn-primary']) !!}
        
        
                        {!! Form::close() !!}
            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection