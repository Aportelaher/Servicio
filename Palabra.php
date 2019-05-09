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
  require_once 'config/config.php';
  $link = mysqli_connect($hostname, $username, $password) or
  die("Could not connect: " . mysqli_error());
  mysqli_set_charset( $link, 'utf8');
  mysqli_select_db($link,$database);
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
<!-- Parte table
-->

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Contextos en los que se emplea "<?php echo "$palabra"  ?>"</h5>
              <?php
                $query = "SELECT distinct Campo_Semántico FROM concentrado_P WHERE Campo_Semántico != 'Expresión' && 
                Campo_Semántico != 'Gramática' && Campo_Semántico != ' ' &&Palabra LIKE '%$palabra%'";
                $result=mysqli_query($link,$query);
                if (mysqli_num_rows($result)>0)
                {
                  while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
                  {
                    $context = $row['Campo_Semántico'];
                    if ($context != '') {
                      ?>
                      <div class="row mt-3">
                        <div class="col-md-12 col-12">
                          <div class="card">
                            <div class="card-header text-center">

                              <a href="Contexto.php?contexto=<?php echo ($context); ?>&palabra=<?php echo ($palabra); ?>"><?php echo ($context); ?></a>
                            </div>
                            <div class="card-body">
                              <?php
                              $query2 = "SELECT Palabra, Traducción FROM concentrado_P WHERE Campo_Semántico = '" . $row['Campo_Semántico'] ."' && Palabra LIKE '%$palabra%' LIMIT 0,2";
                              $result2=mysqli_query($link,$query2);
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
                                  if (mysqli_num_rows($result2)>0)
                                  {
                                    while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
                                    {
                                      $palab = $row2["Palabra"];
                                      $trad = $row2["Traducción"];
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
                              </table> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  }
                }else{
                  echo "Fallo al obtener Contextos";
                }
              ?>
              
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
