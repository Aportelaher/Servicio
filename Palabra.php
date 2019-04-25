<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hualxo.com</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="css/estilos.css">

<?php
  $palabra = $_POST['palabra'];
  $link = mysqli_connect("localhost", "root", "") or
  die("Could not connect: " . mysqli_error());
  mysqli_set_charset( $link, 'utf8');
  mysqli_select_db($link,"Servicio");
?>
    
</head>
<!--
    INICIA BLOQUE QUE MUESTRA RESULTADO DE BUSQUEDA LITERAL Y MUESTRA LA PALABRA BUSCADA
-->
<div class="container">
  <div class="row text-center">
    <div class="col-md-12 titulo">
      <h1>Huelxo.com</h1>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    
    <div class="d-flex justify-content-center">
      <div class="col-md-5">
        <div class="d-flex justify-content-end">
          <div class="col-md-1">
          </div>
          <div class="col-md-2">
            <label for="palabra" class="col-form-label">Palabra</label>
          </div>
          <div class="col-md-4">
            <input type="text" READONLY class="form-control" id="palabra" placeholder=<?php echo "$palabra" ?>>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="d-flex justify-content-start">
          <div class="col-md-2">
            <label for="palabra" class="col-form-label">Traducción Literal</label>
          </div>
          <div class="col-md-3">
            <?php
              $query = "SELECT Traducción from concentrado_P WHERE Palabra LIKE '%".$palabra."%'";
              $result = mysqli_query($link,$query);
              if (mysqli_num_rows($result)>0)
              {
                ?><input type="text" READONLY class="form-control" id="inputEmail3" placeholder="<?php
                $i = 0;
                while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                  if ($i < mysqli_num_rows($result))
                  {
                    echo($row['Traducción'].", ");
                  }else{
                    echo($row['Traducción']);
                  }
                  $i++;
                }
                ?>
                ">
                <?php
              }else{
                ?>
                <input type="text" READONLY/ class="form-control" id="inputEmail3" placeholder="">
                <?php
              }
            ?>
          </div>
          <div class="col-md-3">
            <a href="index.php" class="btn btn-primary">Buscar Nueva Palabra</a><br>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <div id="error"></div>
    </div>
  </div>
</div>
<!--
    TERMINA BLOQUE QUE MUESTRA RESULTADO DE BUSQUEDA LITERAL Y MUESTRA LA PALABRA BUSCADA
-->
<<<<<<< HEAD






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

=======
<!-- Parte table
?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Palabra</th>
                        <th>Traducción</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php

                  if (mysqli_num_rows($result)>0)
                  {
                    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                      $palab = $row["Palabra"];
                      $trad = $row["Traducción"];
                      $camp = $row["Campo_Semántico"];
                      ?>
                        <tr>
                          <td><?php echo "$palab"; ?></td>
                          <td><?php echo "$trad"; ?></td>
                        </tr>
                      <?php
                    }
                  }
                  ?>
                    </tbody>
                  </table> -->

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Contextos en los que se emplea "<?php echo "$palabra"  ?>"</h5>
              <?php
                $query = "SELECT distinct Campo_Semántico FROM concentrado_P WHERE Campo_Semántico != 'Expresión' && Palabra LIKE '%$palabra%'";
                $result=mysqli_query($link,$query);
                if (mysqli_num_rows($result)>0)
                {
                  while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                  {
                    ?>
                    <div class="row mt-3">
                      <div class="col-md-6 col-12">
                        <div class="card">
                          <div class="card-header text-center">
                            <?php echo ($row['Campo_Semántico']); ?>
                          </div>
                          <div class="card-body">
                            <?php
                              $query2 = "";
                            ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      if ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        ?>
                          <div class="col-md-6 col-12 col-sm-12">
                            <div class="card">
                              <div class="card-header text-center">
                                <?php echo ($row['Campo_Semántico']); ?>
                              </div>
                              <div class="card-body">
                                asdasdasd
                              </div>
                            </div>
                          </div>
                        <?php                      
                      }
                      ?>
                    </div>
                    <?php
                  }
                }else{
                  echo "Fallo al obtener Contextos";
                }
              ?>
              
>>>>>>> 742aad0b5ca34970fd1716a78b9adf628538ed98
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Usos Gramaticales de  "<?php echo "$palabra"  ?>"</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  mysqli_free_result($result);
  mysqli_close($link);
?>

	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
  <script src="js/errores.js"></script>
</body>
</html>
