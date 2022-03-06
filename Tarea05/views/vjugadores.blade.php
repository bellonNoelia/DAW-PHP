@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection
@section('contenido')
<div class="container-fluid">
    <div style="padding-top: 1em">
        <h3 class="text-center">Listado de Jugadores</h3>
    </div>

    <div class="container mt-5">
        <button type="submit" class="btn btn-success" style="margin-bottom: 1em;background-color:   #3db215  ; border-color:  #3db215 ;"><a href="fcrearJugador.php" style="color: #ffffff;appearance: button;text-decoration: none;"><i class="fa fa-plus" ></i> Nuevo jugador</a></button>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Posición</th>
                    <th>Dorsal</th>
                    <th>Código de barras</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $item)
                <tr>
                    <td scope="row">{{$item->apellidos,$item->nombre}}</td>
                    <td>{{$item->posicion}}</td>
                    <td>{{$item->dorsal}}</td>
                    <td>{{$item->barcode}}</button>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
