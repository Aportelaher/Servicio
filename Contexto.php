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

  $link = mysqli_connect("localhost", "hugo", "12345") or
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
<!--<br><br>
<img class="mySlides" src="img/Portada.jpg" style="width:100%">-->

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
              $query = "SELECT Traducción from concentrado_P WHERE Palabra = '$palabra'";
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
                                  echo "Contexto: $contexto";
                            ?>
                          </div>
                          <div class="card-body">
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
                                asdasdasd
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
                    <th scope="col">Pronunciación</th>
                    <th scope="col">Imagen</th>
                  </tr>
                </thead>




                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>.</td>
                    <td>.</td>
                    <td>.</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>.</td>
                    <td>.</td>
                    <td>.</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>.</td>
                    <td>.</td>
                    <td>.</td>
                  </tr>
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
