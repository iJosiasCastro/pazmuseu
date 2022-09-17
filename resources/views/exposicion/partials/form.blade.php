<div class="form-group pb-3">
   {!! Form::label('title', 'Título:') !!}
   {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del exposicion']) !!}
   @error('title')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   <div class="pb-2">
      {!! Form::label('file', 'Selecciona una imagen:') !!}
      {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => "loadPreview(this);"]) !!}
   </div>

   @isset($exposicion->image_url)
   <img class="w-100 aspect-video" id="picture" src="{{Storage::url($exposicion->image_url)}}" alt="">
   @else
   <img class="w-100 aspect-video" id="picture" src="/img/placeholder.jpeg" alt="">
   @endif

   @error('file')
      <br>
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('content', 'Contenido:') !!}
   {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
   @error('content')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('game_url', 'Código del juego de Scratch (opcional):') !!}
   {!! Form::text('game_url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código de Scratch']) !!}
   @error('game_url')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>
