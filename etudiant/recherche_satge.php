



    <?php

    $connect= mysqli_connect('localhost', 'root','','gestiondesstages');
    $req="select * from Stage";
    $con=mysqli_query($connect, $req);
    $select=mysql_query($req) or die(mysql_error());
    $compter=mysql_num_rows($select);
    if ($compter<=0){
        echo "Ce stage n'existe pas!";
    }
    else{
    ?><table border=1 style="font-size:13px; text-align:center; font-family:palatino Linotype; color:black;">
            <tr><th>nom du stage</th><th></th><th>date debut</th><th>description</th><th>techniques</th><th>duree</th><th>type de travaux</th></tr>

            <?php
            while($donnee=mysql_fetch_array($req)){
                echo '<tr>';
                echo '<td>'.$donnee['nom_stage'].'</td><td>'.strtoupper($donnee['date_debut']).'</td><td>'.strtoupper($donnee['description']).'</td><td>'.strtoupper($donnee['techniques']).'</td><td>'.strtoupper($donnee['duree']).'</td><td>'.strtoupper($donnee['types_travaux']).'</td><td>'.$donnee['debut_stage'].'</td><td>'.$donnee['description'].'</td><td>'.$donnee[''].'</td>';
                echo'</tr>';
            }
            ?>
        </table>
    }