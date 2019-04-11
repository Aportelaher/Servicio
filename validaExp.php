<?php
      $expresion = $_POST['expresion'];
       var_dump($_POST);

       if (isset($expresion)) 
       {
         
         if ($_POST['expresion']=="uno") 
        { 
          header("location:Saludo.php");
          }
          else
            if ($_POST['expresion']=="dos") 
            { 
              header("location:Dicho.php");
            }
            else
              if ($_POST['expresion']=="tres") 
              { 
                header("location:Modismo.php");
              }
          
       }
      
?>