@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection

@section('contenido')

    <div style="padding-top: 1em">
        <h3 class="text-center">Instalación</h3>
    </div>

    <div class="container mt-5" >
    <div  style="text-align: center;">
        <button type="submit" class="btn btn-success" style="background-color:   #3db215  ; border-color:  #3db215 ; font-size: x-large;"><a href="crearDatos.php" style="color: #ffffff;appearance: button;text-decoration: none;"> <i class="fa fa-database"></i> Instalar Datos de Ejemplo</a></button>
        </div>
    </div>

@endsection
