<?php require_once('../connect/connect.php') ?>

<div class="container">
    <div class="col-md-12" id="mesDepots">

        <h2>vos depots</h2>
        <table class="table table-hover table-responsive">
            <tr>
                <th class="col-md-2"> titre </th>
                <th class="col-md-1"> date debut souhaite</th>
                <th class="col-md-1"> date de depot </th>
                <th class="col-md-1"> Duree (mois) </th>
                <th class="col-md-2"> description </th>
                <th class="col-md-1"> ficher </th>
                <th class="col-md-1"> technologies utilisees </th>
                <th class="col-md-1"> type de traveaux </th>
                <th class="col-md-1"> renumeration </th>
                <th class="col-md-1"> etat </th>
            </tr>

            <?php

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

        </table>
    </div>

 */chercher id mes depot

changer cette partie

resp

on click