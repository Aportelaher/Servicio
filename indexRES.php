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
        }

        {
            box-sizing: border-box;
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
.img2 { background-image: url("img/MoleMadre-EnriqueOlvera.png"); }
.img3 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); } 
.img4 { background-image: url("img/PescaCercana-Virgilio.png"); } 


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 50px;
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
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1200px;
  padding: 0px;
  text-align: center;
}
</style>
    
</head>



<body>
	<!-- Top menu -->
	<nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
    	<div class="container">
	        <a class="navbar-brand" href="index.php">Hualxo</a>
        	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
        	</button>
        	<div class="collapse navbar-collapse" id="navbarNav">
	            <ul class="navbar-nav">           	
            	</ul>

<!--https://bootsnipp.com/snippets/featured/fancy-navbar-login-sign-in-form-->
            	
            	<span class="ml-auto navbar-nav">
            		<li class="nav-item dropdown">
            			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            				Iniciar sesión
            			</a>
            			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="login-dp">
            				<div class="row">
            					<div class="col-md-12">
            						<form class="form" role="form" method="post" action="validalogin.php" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="email">Correo electrónico</label>
											 <input type="email" class="form-control" name="mail" id="email" placeholder="Correo electrónico" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="pass">Contraseña</label>
											 <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Entrar</button>
										</div>
								 </form>
            					</div>
            				</div>
            				<div class="row">
            					<div class="col-md-12">
            						<div class="bottom text-center">
            							¿Aún no estas registrado? <a href="registro.php"><b>Registrarse</b></a>
            						</div>
            					</div>
            				</div>
            			</div>
            		</li>
            	</span>
        	</div>
    	</div>
	</nav>

<div id="captioned-gallery">
            <figure class="slider">
       
                <figure>
                    <img class="mySlides" src="img/Portada.jpg" style="width:100%">
                    <figcaption>Oops, Tiré la Tarta de Limón - Massimo Bottura (ITA) </figcaption>
                </figure>

                <figure>
                    <img class="mySlides" src="img/inicio2.jpg" style="width:100%">
                    <figcaption>Chile en Nogada (MEX) </figcaption>
                </figure>

                <figure>
                    <img class="mySlides" src="img/Gaggan.png" style="width:100%">
                    <figcaption>¿Quien Mató al Cordero? - Gaggan Anand (IND) </figcaption>
                </figure>

                <figure>
                    <img class="mySlides" src="img/inicio4.jpg" style="width:100%">
                    <figcaption>Siete Fuegos - Francis Mallmann (ARG) </figcaption>
                </figure>
                
                <figure>
                    <img class="mySlides" src="img/inicio3.jpg" style="width:100%">
                    <figcaption>Mi Cosecha - Dan Barber (USA) </figcaption>
                </figure>
                
            </figure>
    </div>



<div class="bg-text">BIENVENIDO!</div>

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
                <form method="POST" action="validaRegistro.php" enctype="multipart/form-data">
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
                    <form method="POST" action="validaRegistro.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for="expresion" class="col-form-label">Categorías</label>
                           </div>
                            <div class="col-md-6">
                                <select style="font-size: 15px" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                  <option selected>Escoga...</option>
                                  <option value="1">Saludos </option>
                                  <option value="2">Dichos </option>
                                  <option value="3">Modismos </option>
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
