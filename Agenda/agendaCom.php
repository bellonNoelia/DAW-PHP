<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estiloAgenda.css" />
    <title>Agenda</title>
</head>
<body>
<!-- Creo una variable oculta para poder llamarla desde el otro php. Y así volver a solicitarla desde este.-->
<input id="informacion" name="informacion" type="hidden" value="">

    <br>
    
    <form action="agenda.php" method="post">
        
        <div  >
            <fieldset class="agenda">
                <legend class="datos">Agenda.</legend>
                <?php echo $informacion?> 
                 <!--<?//php include 'agenda.php'; echo $informacion?> No funcionaba por eso creo variable informacion-->
            </fieldset>
        </div>


        <fieldset class="anadir">
                <legend class="datos">Añadir nuevo contacto.</legend>
                <br>
                <label>Nombre: </label>
                <br>
                <br>
                <input type="text" name="nombre" placeholder="Introduce nombre" >
                <br>
                <br>
                <label>Teléfono: </label>
                <br>
                <br>
                <input type="text" name="telefono" placeholder="Introduce el teléfono" >
                <br>
                <br>
                <input type="submit"  name="añadir" value="Añadir contacto">
                <input type="reset"  name="reset" value="Borrar campos" >
        </fieldset>

        <div >
            <fieldset class="vaciarAgenda">
                <legend class="datos">Vaciar agenda.</legend>
                <br>
                <input  type="submit"  name="vaciar" value="Vaciar agenda" >
            </fieldset>
        </div>
        
    </form>
</body>
</html>