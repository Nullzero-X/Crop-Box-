<?php
include_once("../../_conexion_basededatos/database.php");
?>

<?php
if (isset($_GET['idBorrar'])) {
    $sqlBorrar = "DELETE FROM solicitar_nes WHERE IDUsuario='$_SESSION[ID]' AND IDJuego= '$_GET[id]' AND TipoDeArchivo= '$_GET[tipo]' ";
    $resultadoBorrado = mysqli_query($conn, $sqlBorrar);
    if ($resultadoBorrado == true) {
    } else {
    }
}
?>

<?php
$_GET['id'];
$_GET['tipo'];
?>

<?php if (isset($_SESSION['user'])) { ?>

    <div class='bg-white col-lg-7 col-sm-12'>

        <?php
        /* Aqui consulto la tabla CONTENIDONES para dar NOMBRES a TITULOS */
        $consultarTitulos = "SELECT * FROM contenidones WHERE ID = '$_GET[id]'";
        $resultadoTitulos = mysqli_query($conn, $consultarTitulos);
        $filas = mysqli_fetch_assoc($resultadoTitulos);

        /* ---*/
        ?>

        <?php
        /* Si se presiona ENVIAR recogo lo que se ENVIO*/
        if (isset($_GET['solicitar'])) {

            if ($_GET['tipo'] == "box") {

                $sql = "INSERT INTO solicitar_nes
                        (IDUsuario,IDJuego,UsuarioName,TipoDeArchivo,Titulo,Icono)
                        VALUES ('$_SESSION[ID]','$_GET[id]','$_SESSION[user]','$_GET[tipo]','$filas[Titulo]_Box_AME','/Imagenes/Nes/Nes-icon.png')";




                $resultado = mysqli_query($conn, $sql);

        ?>

                <?php /* Comparacion para mensaje*/
                if ($resultado == true && $resultado != "") { ?>
                    <div class='bg-primary rounded-top text-light col-lg-7 col-sm-12'>
                        <strong>Has votado 1 vez muchas gracias</strong>
                    </div>
                <?php } else { ?>
                    <div class='bg-warning col-lg-12 col-sm-12 rounded-top'>
                        <strong>Ya has votado:</strong> (Borra tu solicitud anterior o trata mas tarde)
                    </div>
                <?php
                }
            }
            if ($_GET['tipo'] == "manual") {

                $sql = "INSERT INTO solicitar_nes
                        (IDUsuario,IDJuego,UsuarioName,TipoDeArchivo,Titulo,Icono)
                        VALUES ('$_SESSION[ID]','$_GET[id]','$_SESSION[user]','$_GET[tipo]','$filas[Titulo]_Manual_AME','/Imagenes/Nes/Nes-icon.png')";




                $resultado = mysqli_query($conn, $sql);

                ?>

                <?php /* Comparacion para mensaje*/
                if ($resultado == true && $resultado != "") { ?>
                    <div class='bg-primary rounded-top text-light col-lg-7 col-sm-12'>
                        <strong>Has votado 1 vez muchas gracias</strong>
                    </div>
                <?php } else { ?>
                    <div class='bg-warning col-lg-12 col-sm-12 rounded-top'>
                        <strong>Ya has votado:</strong> (Borra tu solicitud anterior o trata mas tarde)
                    </div>
                <?php
                }
            }

            if ($_GET['tipo'] == "label") {

                $sql = "INSERT INTO solicitar_nes
                        (IDUsuario,IDJuego,UsuarioName,TipoDeArchivo,Titulo,Icono)
                        VALUES ('$_SESSION[ID]','$_GET[id]','$_SESSION[user]','$_GET[tipo]','$filas[Titulo]_Label_AME','/Imagenes/Nes/Nes-icon.png')";




                $resultado = mysqli_query($conn, $sql);

                ?>

                <?php /* Comparacion para mensaje*/
                if ($resultado == true && $resultado != "") { ?>
                    <div class='bg-primary rounded-top text-light col-lg-7 col-sm-12'>
                        <strong>Has votado 1 vez muchas gracias</strong>
                    </div>
                <?php } else { ?>
                    <div class='bg-warning col-lg-12 col-sm-12 rounded-top'>
                        <strong>Ya has votado:</strong> (Borra tu solicitud anterior o trata mas tarde)
                    </div>
        <?php
                }
            }
        }
        /* ---*/



        /* Aqui consulto una tabla SOLICITAR NES */
        $sql2 = "SELECT * FROM solicitar_nes WHERE IDJuego = '$_GET[id]' AND TipoDeArchivo = '$_GET[tipo]' ";
        $resultado2 = mysqli_query($conn, $sql2);
        $datos = [];
        while ($hileras = mysqli_fetch_assoc($resultado2)) {
            $datos[] = $hileras;
        }
        /* ---*/

        /* Aqui consulto la tabla CONTENIDONES */
        $sql3 = "SELECT * FROM contenidones WHERE ID = '$_GET[id]'";
        $resultado3 = mysqli_query($conn, $sql3);
        $datos3 = [];
        while ($hileras2 = mysqli_fetch_assoc($resultado3)) {
            $datos3[] = $hileras2;
        }
        /* ---*/

        /*Consulto TOTAL de VOTOS */
        $consulta_votos = "SELECT COUNT(*) AS TOTAL_VOTOSNES FROM solicitar_nes WHERE IDJuego= '$_GET[id]' AND TipoDeArchivo= '$_GET[tipo]' ";
        $totalvotos = mysqli_query($conn, $consulta_votos);
        $arrayvotos = mysqli_fetch_assoc($totalvotos);
        /* ---*/

        /* FORMULARIO */
        ?>


        <form class="border rounded-bottom ">
            <h5 class="col-lg-12 col-sm-12 pt-2"><strong> Solicitar retoque</strong>
                <img src="/Imagenes/Iconos/votar_icono.png" width=25 height=25>
            </h5>
            <?php foreach ($datos3 as $titulo) { ?>
                <div class="col-lg-12 col-sm-12 ">
                    Puede pasar que este archivo de:
                    <img src="/Imagenes/Iconos/archivo_icono.png" width=20 height=20><strong class="text-primary">
                        <?php echo $titulo['Titulo'] ?></strong>
                    necesite ser retocado; Por ejemplo para <strong>reimpresión y mejorar su calidad</strong>.
                    Da click en el boton de <strong>Solicitar Retoque</strong> para darle prioridad.
                </div>

                <div class="col-lg-12 col-sm-12  py-2">
                <?php } ?>
                <input type="hidden" name="solicitar" value="solicitar">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                <input type="hidden" name="tipo" value="<?php echo $_GET['tipo'] ?>">


                <button type="submit" class="btn btn-primary">Solicitar retoque</button>
                <a class="btn btn-success ml-2" href="/zona_dis_nes/descargas/descarganes.php?id=<?php echo $_GET['id'] ?>&tipo=<?php echo $_GET['tipo'] ?>">
                    ◄ Volver</a>
                <strong>
                    <p class="text-primary ml-2 px-2 rounded d-inline-block">Total de solicitudes:</p>
                </strong> <img src='/Imagenes/Iconos/casilla_votos.png' width=40 height=30>
                <h2 class=' text-primary ml-3  d-inline-block'><?php echo $arrayvotos['TOTAL_VOTOSNES'] ?></h2>
                </div>

        </form>

        <?php



        /* Pinto los COMENTARIOS*/ ?>
        <div class="mt-2">En este archivo a solicitado:</div>
        <?php foreach ($datos as $i) { ?>
            <div class="bg-light mt-2">
                <img src="/Imagenes/Iconos/megusta_icono.png" width=20 height=20>
                <strong class=''> <?php echo $i['UsuarioName'] ?></strong>:



                <?php
                /* En este IF compare si el ID de la sesion es igual al ID del comentario USUARIO
                 ---IDUsuario--- para hacer que aparezca el boton BORRAR*/

                if ($_SESSION['ID'] == $i['IDUsuario']) { ?>
                    <a class="icono_Borrar" href="reporte_votos.php?idBorrar=<?php echo $i['ID'] ?>&id=<?php echo $_GET['id'] ?>&tipo=<?php echo $_GET['tipo'] ?>">
                        <img src="/Imagenes/Iconos/icono_borrado.png" width=32 height=18></a>
                <?php  }

                /* ---*/
                ?>
            </div>
        <?php }
        /* ---*/

        /* -CIERRO EL IF DE HASTA ARRIBA--*/
        ?>
    </div>
<?php
} else { ?>
    <div class="bg-white col-lg-7 col-sm-12">
        <p class=''>Inicia sesion para acceder a esta sección</p>
    </div>

<?php
}

?>