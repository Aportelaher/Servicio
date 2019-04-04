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
        }

          /*Cempohualxochitl
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
  font-size: 50px;
  border: 10px solid #f1f1f1;
  position: fixed;
  top: 35%;
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
  top: 65%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1200px;
  padding: 0px;
  text-align: center;
}
</style>
    
</head>
         	
  <div id="captioned-gallery">
        <img class="mySlides" src="img/Portada.jpg" style="width:100%">
  </div>



<div class="bg-text">
  <div>
  ¡BIENVENIDO!
  </div>
    <div style="font-size: 25px">
  Huelxo.com
  </div>
</div>

<div class="container registro">
  <div class="bg-text2">
        <div class="d-flex justify-content-around">
            <div class="col-md-6">
                <h2>Buscar por Palabra</h2>
            </div>
            <div class="col-md-6">

                <h2>Buscar por Expresión</h2>
            </div>
        </div>

        <div class="d-flex justify-content-around">
            <div class="d-flex justify-content-around">
                <form method="POST" action="Palabra.php" enctype="multipart/form-data">
                      <div class="form-group row">
                        <div class="col-md-6">
                        <label for="palabra" class="col-form-label">Palabra</label>
                        </div>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">Buscar</button><br>
                </form>
            </div>
                 <div class="d-flex justify-content-around">
                    <form method="POST"  action="validaExp.php" enctype="multipart/form-data">
                      <?php /*https://stackoverflow.com/questions/2000656/using-href-links-inside-option-tag*/?>
                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for="expresion" class="col-form-label">Categorías</label>
                           </div>
                            <div class="col-md-6">
                                <select style="font-size: 15px" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" name="expresion">
                                  <option selected>Escoga...</option>
                                  <option value="uno">Saludos </option>
                                  <option value="dos">Dichos </option>
                                  <option value="tres">Modismos </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


	<script src="dist/jquery/jquery.slim.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>


</body>
</html>
