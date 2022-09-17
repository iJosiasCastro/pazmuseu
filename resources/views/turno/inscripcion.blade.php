@extends('layouts.app')

@section('content')
<div class="py-3"></div>
<div class="col-md-6 mx-auto">
   <div class="card">
      <div class="card-body">
         {!! Form::open(['route' => ['turno.inscribirse', $turno], 'autocomplete' => 'off', 'files' => true]) !!}

         
            <div class="form-group pb-3">
                {!! Form::label('name', 'Nombre y apellido:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre y apellido']) !!}
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
                <label for="">Turno seleccionado:</label>
                <div class="col-12 m-0 p-0">
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
                        </div>
                    </div>
                </div>
            </div>
            
            {!! Form::submit('Inscribirse al turno', ['class' => 'btn btn-primary']) !!}


        {!! Form::close() !!}
      </div>
   </div>
</div>

@endsection

@section('css')
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
@endsection

@section('js')
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
@endsection