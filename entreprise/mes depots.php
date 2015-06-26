<div class="container">
    <div class="col-md-8">

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


            $conn = mysqli_connect("localhost","root","root","gestiondesstages");
            if(mysqli_connect_errno()) {
                echo "Failed to connect to MySQL" . mysqli_connect_error();
            }
            $email=$_SESSION['email'];
            $id_entreprise= "SELECT id_entreprise from entreprise where email= $email";
            $resultat = mysqli_query($conn,"SELECT * FROM stage where id_entreprise= $id_entreprise") or die(mysql_error());

            while ($data = mysqli_fetch_assoc($resultat)) {
                echo '<tr>';
                echo '<td>'.$data['titre']. '</td>';
                echo '<td>'.$data['date_debut'].'</td>';
                echo '<td>'.$data['date_publication'].'</td>';
                echo '<td>'.$data['duree'].'</td>';
                echo '<td>'.$data['description'].'</td>';
                echo '<td>'.$data['ficher'].'</td>';
                echo '<td>'.$data['technologies'].'</td>';
                echo '<td>'.$data['type_traveaux'].'</td>';
                echo '<td>'.$data['remumeration'].'</td>';
                echo '<td>'.$data['valide'].'</td>';
                echo '</tr>';
            }
            mysqli_close($conn);?>

        </table>
    </div>


 */chercher id mes depot

changer cette partie

resp

on click