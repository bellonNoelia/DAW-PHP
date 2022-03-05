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
        <h3 class="text-center">Listado de Jugadores</h3>
    </div>

    <div class="container mt-5">
        <button type="submit" class="btn btn-success"><a href="crearJugador.php">+ Nuevo jugador</a></button>

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