<?php
                  $link = mysqli_connect("localhost", "root", "") or
                  die("Could not connect: " . mysqli_error());

    mysqli_set_charset( $link, 'utf8');
                  mysqli_select_db($link,"Servicio");

  
                            /*$result = mysqli_query($link,"select * from concentrado_P where ID <= 100");*/
                            echo "select * from concentrado_P where ID <= 100;";
                            $query = "select * from concentrado_P where ID <= 100";
                            $result=mysqli_query($link,$query);
                            printf("Conjunto de caracteres inicial: %s\n", mysqli_character_set_name($link));
                            

                            if(!$result){
  echo mysqli_error($link);
}
                          if (mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
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
                          }
                            
                            
                            echo ("</table>");
                            
                            mysqli_close($link);
                            //update pelicula set imagen=('/imagen6.jpg') where id_pelicula=6;
                        ?>