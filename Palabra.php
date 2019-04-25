<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hualxo.com</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

    <style>
        body, html 
        {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
        }   /*Cempohualxochitl
            https://gourmetdemexico.com.mx/comida-y-cultura/10-cosas-sabias-la-flor-cempasuchil/#*/
.bg-image {
  /* Full height */
  height: 100%;  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/Portada.jpg"); } 


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 60px;
  border: 10px solid #f1f1f1;
  position: fixed;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1500px;
  padding: 20px;
  text-align: center;
}

.bg-text2 {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 20px;
  position: fixed;
  top: 55%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1200px;
  padding: 0px;
  text-align: center;
}
</style>

<?php
    $palabra = $_POST['palabra'];
 ?>
    
</head>
         	
  <div id="captioned-gallery">
        <img class="mySlides" src="img/Portada.jpg" style="width:100%">
  </div>
<!--
    INICIA BLOQUE QUE MUESTRA RESULTADO DE BUSQUEDA LITERAL Y MUESTRA LA PALABRA BUSCADA
-->
<div class="bg-text">
  <div>
  Huelxo.com
  <br>
     <div class="d-flex justify-content-center">
            <div class="col-md-5">
                <form  style="font-size: 15px" method="POST" action="Palabra.php" enctype="multipart/form-data">
                      <div class="d-flex justify-content-end">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2">
                        <label for="palabra" class="col-form-label">Palabra</label>
                        </div>
                        <div class="col-md-4">
                          <input type="text" READONLY/ class="form-control" id="palabra" placeholder=<?php echo "$palabra" ?>>
                        </div>
                      </div>
                </form>
            </div>
            <div class="col-md-7">
                <form  style="font-size: 15px" method="POST" action="index.php" enctype="multipart/form-data">
                      <div class="d-flex justify-content-start">
                        <div class="col-md-2">
                        <label for="palabra" class="col-form-label">Traducción Literal</label>
                        </div>
                        <div class="col-md-3">
                          <input type="text" READONLY/ class="form-control" id="inputEmail3" placeholder="">
                        </div>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Buscar Nueva Palabra</button><br>
                        </div>
                        <div class="col-md-2">
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--
    TERMINA BLOQUE QUE MUESTRA RESULTADO DE BUSQUEDA LITERAL Y MUESTRA LA PALABRA BUSCADA
-->






<div class="container registro">
  <div class="bg-text2">
        <div class="d-flex justify-content-around">
            <div class="col-md-6" style="font-size: 20px">
                <label>Contextos en los que se emplea "<?php echo "$palabra"  ?>"</label>
                <!--
    INCIA BLOQUE QUE MUESTRA LOS CONTEXTOS DE LA BÚSQUEDA
-->
<table border="20">
  <?php
    $link = mysqli_connect("localhost", "hugo", "12345") or
    die("Could not connect: " . mysqli_error());
    mysqli_set_charset( $link, 'utf8');
    mysqli_select_db($link,"Servicio");

    $query = "select distinct Campo_Semántico, Palabra, Traducción from Concentrado_P as V1 inner join (select  Campo_Semántico as Res from Concentrado_P) as V2 on V1.Campo_Semántico = V2.Res WHERE Palabra LIKE '%$palabra%' and Campo_Semántico != 'Expresión' limit 2"; 


    $result = mysqli_query($link,$query);
    if (mysqli_num_rows($result)>0)
    {
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        $ID = $row["ID"];
        $palab = $row["Palabra"];
        $trad = $row["Traducción"];
        $tipo= $row["Tipo"];
        $gen = $row["Género"];
        $camp = $row["Campo_Semántico"];
        $grupo = $row['Grupo'];
        ?>
        <tr>
          <td><?php echo "$ID"; ?></td>
          <td><?php echo "$palab"; ?></td>
          <td><?php echo "$trad"; ?></td>
          <td><?php echo "$tipo"; ?></td>
          <td><?php echo "$gen"; ?></td>
          <td><?php echo "$camp"; ?></td>
          <td><?php echo "$grupo"; ?></td>
        </tr>
        <?php
      }
    }else
    echo ("</table>");
    mysqli_free_result($result);
    mysqli_close($link);
    //update pelicula set imagen=('/imagen6.jpg') where id_pelicula=6;
  ?>



<div class="container registro">
  <div class="bg-text2">
        <div class="d-flex justify-content-around">
            <div class="col-md-6" style="font-size: 20px">
                <label>Contextos en los que se emplea "<?php echo "$palabra"  ?>"</label>

            </div>
            <div class="col-md-6">
                <label>Usos Gramaticales de  "<?php echo "$palabra"  ?>"</label>
            </div>
        </div>
    </div>
</div>


	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>


</body>
</html>
