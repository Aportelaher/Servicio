<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uel Uelik</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

    <style>
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Montserrat', sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Images used */
.img1 { background-image: url("img/PatoZensai-NikiNakayama.png"); }
.img2 { background-image: url("img/ArrozNegroYLechedeNueces-AlexAtala.png"); }
.img3 { background-image: url("img/CosechaPasachámac-Virgilio.png"); }
.img4 { background-image: url("img/MoleMadre-EnriqueOlvera.png"); }


/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  font-size: 80px;
  border: 10px solid #f1f1f1;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 1500px;
  padding: 20px;
  text-align: center;
}
</style>
</head>
<body>
	<!-- Top menu -->
    <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
        <div class="container">
            <a class="navbar-brand" href="index.php">UEL UELIK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="consulta.php">Consulta de receta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="acerca.php">Acerca de</a>
                    </li>
                    
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

    <div class="bg-image img1">
    <div class="container registro">
        <div class="row">
            <div class="col-md-3 col-izq">
                <?php
                    require_once 'config.php';
                    require_once 'conexion.php';
                    $base = new dbmysqli($hostname,$username,$password,$database);

                ?>
                <h3>Ingredientes</h3>
                <span class="msg-ayuda">Da click sobre los ingredientes que quieres agregar</span>
                <div class="form-group">
                    <label for="nombre"></label>
                    <input type="text" class="form-control" id="busqueda" placeholder="Nombre" required>
                </div>
                <div id="resultado"></div>
                <ul class="list-group text-ingredientes scroll1">
                <?php
                    $consulta = "SELECT DISTINCT nombre FROM ingrediente";
                    $result = $base->ExecuteQuery($consulta);
                    if($result){
                        while ($row=$base->GetRows($result)){
                            $nombre = $row['0'];
                            ?>
                                <li class="list-group-item" id="<?php echo "$nombre" ?>" onclick="agregar(<?php echo "'$nombre'" ?>)"><?php echo "$nombre"; ?></li>
                            <?php
                        }
                        $base->SetFreeResult($result);
                    }else{
                        echo "<h3>Error generando la consulta</h3>";
                    }
                    $base -> CloseConnection();
                ?>
                    <div id="agregarIngrediente"></div>
                </ul>
            </div>
            <div class="col-md-9 col-der">
                <div class="row ingredientes2 text-center">
                    <div class="col-md-12">
                        <h3>Ingredientes agregados</h3>
                        <span class="msg-ayuda">Si deseas eliminar un ingrediente da click sobre él</span>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <ul class="list-group text-ingredientes">
                            <div id="ingredientes"></div>
                        </ul>
                    </div>
                </div>
                <form action="receta.php" method="POST">
                    <div id="id"></div>
                    <div class="fondo text-center" id="msg-agregamas"></div>
                    <div class="fondo text-center"><button type="submit" class="btn btn-primary" onclick="enviar()" id="btnsend">Buscar receta</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
	<script src="dist/jquery/jquery.min.js"></script>
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/popper/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var consulta;
            //comprobamos si se pulsa una tecla
            $("#busqueda").keyup(function(e){
                //obtenemos el texto introducido en el campo de búsqueda
                consulta = $("#busqueda").val();
                //hace la búsqueda
                $.ajax({
                    type: "POST",
                    url: "buscar.php",
                    data: "b="+consulta,
                    dataType: "html",
                    error: function(){
                    alert("error petición ajax");
                    },
                    success: function(data){                                                    
                    $("#resultado").empty();
                    $("#resultado").append(data);                                                             
                    }
                });
            });                                                     
});
    </script>
    <script type="text/javascript">
        
        var ingredientes = [];
        if (ingredientes.length<3) {
            document.getElementById("btnsend").disabled = true;
            document.getElementById("msg-agregamas").innerHTML = "Debes agregar al menos 3 ingredientes";
        }else{
            document.getElementById("btnsend").disabled = false;
        }
        function agregar(nombre){
            
            console.info(  );
            if (ingredientes.includes(nombre)) {
                alert("El ingrediente ya se ha agregado");
            }else{
                ingredientes.push(nombre);
                var ingrediente = "<li class='list-group-item' id='"+nombre+"' onclick='eliminar(\""+nombre+"2\")'>"+nombre+"</li>";
                console.log(ingrediente);
                document.getElementById("ingredientes").innerHTML += ingrediente;
                document.getElementById(nombre).remove();
                console.log(nombre);
                if (ingredientes.length<3) {
                    document.getElementById("btnsend").disabled = true;
                    document.getElementById("msg-agregamas").innerHTML = "Debes agregar al menos 3 ingredientes";
                }else{
                   document.getElementById("btnsend").disabled = false;
                   document.getElementById("msg-agregamas").innerHTML = "";
                }
            }
        }
        function eliminar(nombre) {
            nombre = nombre.substring(0, nombre.length-1);
            console.log(nombre);
            var index = ingredientes.indexOf(nombre);
            if (index > -1) {
                ingredientes.splice(index, 1);
            }
            console.log(index);
            var ingrediente = "<li class='list-group-item' id='"+nombre+"' onclick='agregar(\""+nombre+"\")'>"+nombre+"</li>";
            document.getElementById(nombre).remove();
            document.getElementById("agregarIngrediente").innerHTML += ingrediente;
            if (ingredientes.length<3) {
                document.getElementById("btnsend").disabled = true;
                document.getElementById("msg-agregamas").innerHTML = "Debes agregar al menos 3 ingredientes";
            }else{
                document.getElementById("btnsend").disabled = false;
                document.getElementById("msg-agregamas").innerHTML = "";
            }
            console.log("Elemento eliminado");
        }
        function enviar(){
            
            var boton = "<input type='text' name='ids[]'>";
            for (var i = ingredientes.length - 1; i >= 0; i--) {
                console.log(ingredientes[i]);
                boton = "<input class='oculto' type='text' name='ids[]' value='"+ingredientes[i]+"'>";
                document.getElementById("id").innerHTML += boton;    
            }
        }
    </script>
</body>
</html>