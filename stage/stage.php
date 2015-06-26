<?php require_once('../connect/connect.php') ?>


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
        echo '<td> <a href="../stage/stage.php?id= '.$data2['id_stage'].'">' . $data2['titre'] . '</a> </td>';
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

<div class="container">
    <div class="col-md-12" id="mesDepots">

        <form class="form-horizontal">
            <div class="container">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nom_stage" class="col-sm-2 control-label">Titre du stage</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name = "titre" id="titre" placeholder="titre de stage">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_debut" class="col-sm-2 control-label">Date de debut souhaite</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name = "date_debut" id="date_debut" placeholder="date_debut">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="duree" class="col-sm-2 control-label">Duree</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"  name="duree" id="duree" placeholder="duree">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" placeholder="description" rows="3"></textarea>
                            <!--<input type="text" class="form-control" id="description" placeholder="description">-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ficher"  class="col-sm-2 control-label">Fichier</label>
                        <div class="col-sm-10">
                            <input type="file" name="ficher" id="ficher">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="technologies" class="col-sm-2 control-label">technologies utilisees</label>
                        <div class="col-sm-10">
                            <?php
                            $resultat_technologies = mysqli_query($connect,"SELECT * FROM technologies") or die(mysql_error());
                            while ($data = mysqli_fetch_assoc($resultat_technologies)) { ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox"  name="technologies[]" id="technologies" value="<?php echo $data['nom']?>"> <?php echo $data['nom']?>
                                </label>
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type_traveaux" class="col-sm-2 control-label">type de traveaux</label>
                        <div class="col-sm-10">
                            <?php
                            $resultat_traveaux = mysqli_query($connect,"SELECT * FROM type_traveaux") or die(mysql_error());
                            while ($data = mysqli_fetch_assoc($resultat_traveaux)) { ?>
                                <label class="checkbox-inline">
                                    <input type="checkbox"  name="type_traveaux[]" id="type_traveaux" value="<?php echo $data['nom']?>"> <?php echo $data['nom']?>
                                </label>
                            <?php }
                            ?>
                            <!--<label class="checkbox-inline">
                                <input type="checkbox"  name="type_traveaux[]" id="type_traveaux" value="developpment web"> developpement web
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="type_traveaux[]" id="type_traveauxp" value="gestion de projet"> gestion de projet
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="type_traveaux[]" id="type_traveaux" value="application mobile"> application mobile
                            </label>-->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="renumeration" class="col-sm-2 control-label">renumeration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="renumeration" id="renumeration" placeholder="renumeration">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Valider</button>
                        </div>

                    </div>


                </div>
            </div>
        </form>

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

