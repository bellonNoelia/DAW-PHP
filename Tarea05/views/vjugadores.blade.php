@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection
@section('contenido')
<div class="container-fluid" style="width:100%;background-color: #fb9971  ;">
    @if (isset($mensaje))
    <div class="alert alert-success">
        <p>{{ $mensaje }}</p>
    </div>
    @endif

    <div style="padding-top: 1em">
        <h3 class="text-center">Listado de Jugadores</h3>
    </div>

    <div class="container mt-5">
        <button type="submit" class="btn btn-success"
            style="margin-bottom: 1em;background-color:   #3db215  ; border-color:  #3db215 ;"><a href="fcrear.php"
                style="color: #ffffff;appearance: button;text-decoration: none;"><i class="fa fa-plus"></i> Nuevo
                jugador</a></button>

        <table class="table table-dark table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Posición</th>
                    <th scope="col">Dorsal</th>
                    <th scope="col">Código de barras</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $item)
                <tr class="text-center">
                    <td scope="row">{{$item->apellidos.", ".$item->nombre}}</td>
                    <td>{{$item->posicion}}</td>
                    @if(isset($item->dorsal))
                    <td>{{$item->dorsal}}</td>
                    @else
                    <td>Sin Asignar</td>
                    @endif
                    <td class="d-flex justify-content-center">@php echo $d->getBarcodeHTML($item->barcode, 'EAN13',2,33,
                        'white') @endphp</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection