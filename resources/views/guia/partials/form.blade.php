<div class="form-group pb-3">
   {!! Form::label('name', 'Nombre y apellido:') !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre y apellido del guia']) !!}
   @error('name')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('email', 'Email:') !!}
   {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del guia']) !!}
   @error('email')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('idioma', 'Selecciona un idioma:') !!}
   {!! Form::select('idioma', ['español' => 'Español', 'portugués' => 'Portugués', 'inglés' => 'Inglés', 'alemán' => 'Alemán', 'italiano' => 'Italiano', 'chino' => 'Chino'], null, ['class' => 'form-control', ]) !!}
   @error('idioma')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   <div class="pb-2">
      {!! Form::label('file', 'Selecciona una imagen:') !!}
      {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*', 'onchange' => "loadPreview(this);"]) !!}
   </div>

   @isset($guia->image_url)
   <img class="w-100 aspect-video" id="picture" src="{{Storage::url($guia->image_url)}}" alt="">
   @else
   <img class="w-100 aspect-video" id="picture" src="/img/placeholder.jpeg" alt="">
   @endif

   @error('file')
      <br>
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>