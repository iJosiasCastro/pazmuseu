<div class="form-group pb-3">
   {!! Form::label('title', 'Título:') !!}
   {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del ruta']) !!}
   @error('title')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   <div class="pb-2">
      {!! Form::label('file', 'Selecciona una imagen:') !!}
      {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => "loadPreview(this);"]) !!}
   </div>

   @isset($ruta->image_url)
      <img class="w-100 aspect-video" id="picture" src="{{Storage::url($ruta->image_url)}}" alt="">
   @else
      <img class="w-100 aspect-video" id="picture" src="/img/placeholder.jpeg" alt="">
   @endif

   @error('file')
      <br>
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('exposicions', 'Exposiciones:') !!}
   <div class="mt-n2 mb-2">
      <small>Seleccione las exposiciones que son parte de la ruta</small>
   </div>
   @foreach ($exposicions as $exposicion)
       {!! Form::checkbox('exposicions[]', $exposicion->id, null) !!}
       {{$exposicion->title}}
       <br>
   @endforeach
   @error('exposicions')
       <div class="mt-3 alert alert-danger">
           {{$message}}
       </div>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('description', 'Descripción:') !!}
   {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
   @error('description')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>


