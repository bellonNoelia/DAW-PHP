@extends('plantillas.plantilla1')
@section('titulo')
{{$titulo}}
@endsection
@section('encabezado')
{{$encabezado}}
@endsection

@section('contenido')

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
                    <input id="dorsal" name="dorsal" type="number" class="form-control" placeholder="Dorsal">
                </div>
                <div class="col">
                    <label for="posicion">Posición</label>
                    <select id="posicion" name="posicion" class="form-select">
                        <option selected value="Portero">Portero</option>
                        <option value="Defensa">Defensa</option>
                        <option value="Lateral Izquierdo">Lateral Izquierdo</option>
                        <option value="Lateral Derecho">Lateral Derecho</option>
                        <option value="Central">Central</option>
                        <option value="Delantero">Delantero</option>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="barcode">Código de barras</label>
                        <input id="barcode" name="barcode" type="text" class="form-control"
                            placeholder="Código de barras" readonly>
                    </div>
                </div>
                <div style="margin-top: 1em">
                    <button type="submit" name="crear" class="btn btn-primary" >Crear</button>
                    <button type="reset" class="btn btn-success" style="margin-left: 1em;background-color:   #3db215  ; border-color:  #3db215 ;">Limpiar</button>
                    <button type="button" class="btn btn-info" style="margin-left: 1em"><a href="index.php" style="color: #ffffff;appearance: button;text-decoration: none;">Volver</a></button>
                    <button type="button" class="btn " style="background-color:#9a9a9a ;border-color: #9a9a9a ;margin-left: 1em"><a href="generarCode.php" style="color: #ffffff;appearance: button;text-decoration: none;"> <i class="fa fa-barcode"></i></i> Generar barcode</a></button>
                </div>
            </div>
        </form>
    </div>

@endsection
