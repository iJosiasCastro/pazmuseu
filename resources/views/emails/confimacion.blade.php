@component('mail::message')
# Hola {{$data['inscripcion']->name}}!

Fue confirmada su inscripción al turno de la ruta "{{ $data['turno']->ruta->title }}" que será llevado a cabo el día {{ date('d-m-Y', strtotime($data['turno']->fecha)) }} a las {{date('h:ia' , strtotime($data['turno']->hora))}}. ¡No se olvidé de asistir, le esperamos!

@component('mail::button', ['url' => 'http://192.168.0.186:8080/'])
Visitar museo virtual
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent   
