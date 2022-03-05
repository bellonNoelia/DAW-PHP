@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection
@section('contenido')
<div class="container-fluid" style="width:100%; height:100%; background-color:#f5af70;">
    <div>
        <h3 class="text-center">Instalación</h3>
    </div>

    <div class="container mt-5">
        <button type="submit" class="btn btn-success"><a href="crearDatos.php"> <i class="fa fa-database"></i>"></i>Instalar datos de ejemplo</a></button>

    </div>
</div>
@endsection