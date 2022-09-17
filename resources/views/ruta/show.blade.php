@extends('layouts.app')

@section('content')
    <div class="col-md-8 mx-auto">
        <div class="py-4"></div>
        <h1>{{$ruta->title}}</h1>
        <img class="w-100" src="{{Storage::url($ruta->image_url)}}">
        <div class="py-4"></div>
        <h2 class="h3">Exposiciones</h2>
        <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th scope="col">Título</th>
                <th scope="col">Imagen</th>
                <th scope="col"></th>
              </tr>
            </thead>
            
            <tbody>
                @foreach($ruta->exposicions as $exposicion)
                <tr>
                    <td>{{$exposicion->title}}</td>
                    <td>
                        <img class="align-items-start d-flex flex-column justify-content-end" height="100px" src="{{Storage::url($exposicion->image_url)}}">
                    </td>
                    <td><a href="{{route('exposicion.show', $exposicion)}}" class="btn btn-primary">Visitar</a></td>

                </tr>
                @endforeach
            </tbody>
          </table>
        <div class="py-4"></div>

        <h2 class="h3">Descripción</h2>
        <p>{{$exposicion->content}}</p>


        <div class="py-5"></div>
        <h3 class="h4">Más rutas</h3>
        <div class="row">
            @foreach($related as $ruta)
                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                    <a href="{{route('exposicion.show', $ruta)}}"  class="bg-light card relative">
                        <img class="align-items-start card-img d-flex flex-column justify-content-end" src="{{Storage::url($ruta->image_url)}}">
                        <div class="card-gradient p-2 w-100 absolute">
                            <h5 class="mb-0 text-light">{{$ruta->title}}</h5>
                        </div>
                        <div class="bg-primary card-line-bottom"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection