<div class="form-group pb-3">
   {!! Form::label('fecha', 'Fecha:') !!}
   {!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del turno']) !!}
   @error('fecha')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('hora', 'Hora:') !!}
   {!! Form::time('hora', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la fecha del turno']) !!}
   @error('hora')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('ruta_id', 'Seleccione la ruta:') !!}
   {!! Form::select('ruta_id', $rutas, null, ['class' => 'form-control', ]) !!}
   @error('ruta_id')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>

<div class="form-group pb-3">
   {!! Form::label('guia_id', 'Seleccione el guía:') !!}
   {!! Form::select('guia_id', $guias, null, ['class' => 'form-control', ]) !!}
   @error('guia_id')
      <small class="text-danger">{{$message}}</small>
   @enderror
</div>