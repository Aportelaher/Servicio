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

  <style>
  .img1 { background-image: url("img/Portada.jpg"); } 
  </style>
<?php
  $palabra = $_GET['palabra'];
  $contexto = $_GET['contexto'];

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
<!--<br><br>
<img class="mySlides" src="img/Portada.jpg" style="width:100%">-->

<div class="container mt-4">
  <div class="row text-center">
    <div class="col-sm-12 col-md-4">
      <div class="label-bt">Palabra</div>
      <div class="bt-read"><?php echo "$palabra" ?></div>
    </div>
    <div class="col-sm-12 col-md-4 mt-3 mt-sm-0">
      <div class="label-bt">Traducción Literal</div>
      <?php
      $query = "SELECT Traducción from concentrado_P WHERE Palabra LIKE '%".$palabra."%' LIMIT 0,1";
      
      $result = mysqli_query($link,$query);
      if (mysqli_num_rows($result)>0)
      {
        ?>
        <div class="bt-read"><?php
        $i = 0;
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
          echo($row['Traducción']);
        }
          ?>
        </div>
          <?php
        }else{
          ?>
          No se encontro una traducción literal
          <?php
        }
        ?>
    </div>
    <div class="col-sm-12 col-md-4 mt-3 mt-sm-0">
      <a href="index.php" class="btn btn-primary">Buscar Nueva Palabra</a>
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

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
               

                    <div class="row mt-3">
                      <div class="col-md-12">
                        <div class="card">
                          <div class="card-header text-center">
                            <?php 
                                  echo "Contexto";
                            ?>
                          </div>
                          <div class="card-body text-center">
                            <?php 
                                  echo "$contexto";
                            ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      if ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                        ?>
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-header text-center">
                              </div>
                              <div class="card-body">
                              </div>
                            </div>
                          </div>
                        <?php                      
                      }
                      ?>
                    </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="col-sm-12">
          <div class="card">
            <div class="card-body">

              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Palabra</th>
                    <th scope="col">Traducción</th>
                    <!--
                    <th scope="col">Pronunciación</th>
                    <th scope="col">Imagen</th>
                  -->
                  </tr>
                </thead>

                <tbody>
                            <?php
                                $query = "SELECT Palabra, Traducción FROM concentrado_P WHERE Campo_Semántico = '$contexto' && Palabra LIKE '%$palabra%'";
                                $result=mysqli_query($link,$query); 
                                  if (mysqli_num_rows($result)>0)
                                  {
                                    while ($row2 = mysqli_fetch_array($result,MYSQLI_ASSOC))
                                    {
                                      $palab = $row2["Palabra"];
                                      $trad = $row2["Traducción"];
                                      //palab = PALABRA EN ESPAÑOL
                                      //trad = TRADUCCION
                                      ?>

                  <tr>
                    <th scope="row"><?php echo "$palab"; ?></th>
                    <td><?php echo "$trad"; ?></td>
                    <!--
                    <td>.</td>
                    <td>.</td>
                    -->
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
