
<!doctype html>
<html lang="en">
<?php  session_start();?>
<?php include("head.php"); //Hola?>

<body>

    <div class="container-fluid jardin-fondo">
  
        <div class="container-fluid " id="contenedorPrinicpal">
        
            <div class=" row ">

            <?php include("navbar.php"); ?>

                <?php include("header.php"); ?>
                <?php include("titulo.php"); ?>
                <?php include("breadcrumb.php"); ?>
                <?php // include("area_de_slider/slider.php"); ?>
                <?php include("blog/blog.php"); ?>
                <?php include("area_de_reportes/reportes.php"); ?>
                <?php include("footer.php"); ?>
            </div>
        </div>
    </div>

                <?php include("scripts.php"); ?>

</body>


</html>