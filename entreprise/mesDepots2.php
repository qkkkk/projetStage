<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 2015/6/29
 * Time: 18:03
 */
session_start();


            $email=$_SESSION['email'];
            $query = "SELECT id_entreprise FROM  entreprise WHERE email='" . $email . "'" or die(mysql_error());
            $result = mysqli_query($connect,$query);
            while ($data = mysqli_fetch_assoc($result)) {
                $data['id_entreprise'];
                $id_entreprise = $data['id_entreprise'];
                $query2 = "SELECT * FROM stage WHERE id_entreprise=$id_entreprise ";
                $result2 = mysqli_query($connect, $query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    echo '<tr>';
                    echo '<td>' . $data2['titre'] . '</td>';
                    echo '<td>' . $data2['date_debut'] . '</td>';
                    echo '<td>' . $data2['date_publication'] . '</td>';
                    echo '<td>' . $data2['duree'] . '</td>';
                    echo '<td>' . $data2['description'] . '</td>';
                    echo '<td>' . $data2['ficher'] . '</td>';
                    echo '<td>' . $data2['nom_type_traveaux'] . '</td>';
                    echo '<td>' . $data2['nom_technologies'] . '</td>';
                    echo '<td>' . $data2['renumeration'] . '</td>';
                    if ($data2['valide']==0) {
                        echo '<td> en attente </td>';
                    }
                    elseif  ($data2['valide']==1) {
                        echo  '<td> valide </td>';
                    }
                    elseif  ($data2['valide']==2) {
                        echo  '<td> refuse </td>';
                    }

                    echo '</tr>';
                }
            }
            mysqli_close($connect);?>