@extends('layouts.app')

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="py-4"></div>
        <h3>Todas las exposiciones</h3>
        <div class="row">
            @foreach($exposicions as $exposicion)
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
    </div>
@endsection