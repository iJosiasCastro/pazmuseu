@extends('layouts.app')

@section('content')
<div class="col-md-6 mx-auto">
   <div class="py-4"></div>
   @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
   <div class="card">
      <div class="card-body">
        <h2 class="h3">Inscripciones</h2>
        <div class="pb-3">
           <p>Ruta: "{{ $turno->ruta->title }}"</p>
           <p>Fecha:  {{ date('d-m-Y', strtotime($turno->fecha)) }}</p>
           <p>Hora:  {{date('h:ia' , strtotime($turno->hora))}}</p>
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
                @foreach($turno->inscripciones as $inscripcion)
                <tr>
                    <td>{{$inscripcion->name}}</td>
                    <td>{{$inscripcion->email}}</td>
                    <td class="font-weight-bold">
                     @if($inscripcion->confirmada)
                        <span class="text-success">
                           Confirmada
                        </span>
                     @else
                        <span class="text-danger">
                           Sin confirmar
                        </span>
                     @endif
                     </td>
                    <td>
                        @if(!$inscripcion->confirmada)
                        <form action="{{route('turno.inscripcion.confirmar', [$turno, $inscripcion])}}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-primary mb-2">
                              Confirmar
                           </button>
                        </form>
                        <form action="{{route('turno.inscripcion.eliminar', [$turno, $inscripcion])}}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        @endif
                    </td>

                </tr>
                @endforeach
               </tbody>
            </table>
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