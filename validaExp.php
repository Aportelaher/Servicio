<?php
      if (isset($_POST['expresion'])=="uno") 
      { 
          header("location:Saludo.php");
      }
      else
      if (isset($_POST['expresion'])=="2") 
      { 
          header("location:Dicho.php");
      }
      else
      if (isset($_POST['expresion'])=="tres") 
      { 
          header("location:Modismo.php");
      }

?>