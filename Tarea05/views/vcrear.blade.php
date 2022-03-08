@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection

@section('contenido')
<div class="container-fluid" style="width:100%; height:100vh;background-color: #fb9971  ;">

    <div style="padding-top: 1em">
        <h3 class="text-center">Crear Jugador</h3>
    </div>
    <div class="container mt-5">
        <form method="POST" action="crearJugador.php">
            <div class="row">
                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="col">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="dorsal">Dorsal</label>
                    <input id="dorsal" name="dorsal" type="number" class="form-control" placeholder="Dorsal" min="1"
                        step="1" max="40">
                </div>
                <div class="col">
                    <label for="posicion">Posición</label>
                    <select id="posicion" name="posicion" class="form-select">
                        <option value="1">Portero</option>
                        <option value="2">Defensa</option>
                        <option value="3">Lateral Izquierdo</option>
                        <option value="4">Lateral Derecho</option>
                        <option value="5">Central</option>
                        <option value="6">Delantero</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="barcode">Código de barras</label>
                        @if(!isset($barcode))
                        <input id="barcode" name="barcode" type="text" class="form-control"
                            placeholder="Código de barras" readonly>
                        @else
                        <input type="text" value="{{$barcode}}" class="form-control" name="barcode" readonly>

                        @endif

                    </div>
                </div>
                <div style="margin-top: 1em">
                    <button type="submit" name="crear" class="btn btn-primary">Crear</button>
                    <button type="reset" class="btn btn-success"
                        style="margin-left: 1em;background-color:   #3db215  ; border-color:  #3db215 ;">Limpiar</button>
                    <button type="button" class="btn btn-info" style="margin-left: 1em"><a href="index.php"
                            style="color: #ffffff;appearance: button;text-decoration: none;">Volver</a></button>
                    <button type="button" class="btn "
                        style="background-color:#9a9a9a ;border-color: #9a9a9a ;margin-left: 1em"><a
                            href="generarCode.php" style="color: #ffffff;appearance: button;text-decoration: none;"> <i
                                class="fa fa-barcode"></i></i> Generar barcode</a></button>
                </div>
            </div>
        </form>
        @if (isset($error))
        <div class="alert alert-danger h-100 mt-3">
            <p>{{ $error }}</p>
        </div>
        @endif
    </div>

</div>
@endsection