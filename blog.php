<?php
include('consulta_de_datos.php');
?>

<div class=" border rounded bg-white col-lg-7 col-sm-12 ">

  <h5><strong>Novedades del Website</strong></h5>

  <div class="row col ">
    <div class="bg-white">

      <?php
      foreach ($datos as $i) { ?>
        <div class="col border border-right-0 rounded py-2 ml-2" id="cuadros">
          <h6 class="text-primary"> <?php echo $i['Titulo'] ?></h6>
          <img src="/<?php echo $i['Icono_calendario'] ?> width=15 height=15" class="calendario_icono">
          <span>Date-</span>
          <span class='text-primary'><?php echo $i['Fecha'] ?></span>
          <div class="salto_de_linea"></div>
          <img src="/<?php echo $i['usuario_icon'] ?>" width=15 height=15 class='usuario_icono'>
          <span class="text-primary">Nullzero</span>
          </img>
        </div>
      <?php } ?>

      <?php
      foreach ($datos2 as $i) {
        echo "<div class=' col  rounded  py-2 ml-2 ' class='calendarios_blog'>";
        echo  "<h6 class='titulo_blog'>$i[Titulo]</h6>";
        echo "<img src='/ $i[Icono_calendario]' width=15 height=15 class='calendario_icono2'></img>";
        echo "Date-";
        echo  "<span class='fecha_blog'>$i[Fecha]</span>";
        echo "<div class='salto_de_linea'></div>";
        echo "<img src='/$i[usuario_icon]' width=15 height=15 class='usuario_icono2'><span class='Posteado_por'>Nullzero</span></img>";
        echo  "</div>";
      } ?>
    </div>


    <?php
    foreach ($datos as $i) {



      echo "<div class=' col ' >";
      echo "<div class='foto_blog'><img src='/$i[Imagen]' class='foto_blog' width=250 height=200></div>";
      echo "<p class='articulo_blog' id='parrafo1'>$i[Comentario] </p>";
      echo "</div>";
    }

    ?>






    <!-- </div> -->

    <div class="caja_clear_2"></div>



    <div class="numeracion col-12" id="paginador">



      <?php

      if ($total_registros) {
        echo '<div class=" py-4 col-lg-8 col-sm-8 float-right numeracion">';
        if (($pagina - 1) > 0) {
          echo '<a class="py-3 px-2 border rounded-left" href="index.php?pagina=' . ($pagina - 1) . '">Siguiente-</a>';
        }
        for ($i = 1; $i <= $total_paginas; $i++) {
          if ($pagina == $i) {
            echo '<a class="py-3 px-2 border  " href="#"> <span class= destacada">' . $i . '</span></a>';
          }/*else{
                  echo '<a href="index.php?pagina='.$i.'">'.$i.'</a>';
              }*/
        }
        if (($pagina + 1) <= $total_paginas) {
          echo '<a class="py-3 px-2 border rounded-right " href="index.php?pagina=' . ($pagina + 1) . '">- Anterior</a>';
        }
        echo '</div>';
      }
      ?>


    </div>


  </div>

</div>