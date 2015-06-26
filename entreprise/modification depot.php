<?php
session_start();

$connect = mysqli_connect("localhost", "root", "root", "gestiondesstages");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}


$id_annonce=$_POST['id_annonce'];

$query = "SELECT * FROM  stage where id_stage = $id_annonce" or die(mysql_error());
$result = mysqli_query($connect,$query);
while ($data = mysqli_fetch_assoc($result)) {
//$id_stage= $data['id_stage'];
// echo $_POST[$data['id_stage']];
//echo $_POST[$data['id_stage']];

 $type_traveaux=explode(",",$data['nom_type_traveaux']);
 $technologies=explode(",",$data['nom_technologies']);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
    <title></title>

</head>
<body>
<nav class="navbar navbar-default navbar-static ">
    <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand col-sm-1" href="index.html" >
                    <img alt="Brand" src="../images/logo_upmf.jpg">
                </a>
            </div>
            <div class="navbar-text col-sm-4">
                <h1>Plate-forme<br/> Stage</h1>
            </div>
            <div class="navigation">
                <p class="navbar-text navbar-right">Bonjour,<?php echo $_SESSION['email']; ?></p>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                    <li role="presentation"><a href="#">modifier mes infos</a></li>
                    <li role="presentation"><a href="deconnexion.php">quitter</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<form class="form-horizontal" action ="php de modification stage.php" method="post">
        <div class="container">
            <h2>Modifier votre depot de stage no.<?php echo $data['id_stage'], $data['titre'] ;?></h2>
            </br>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nom_stage" class="col-sm-2 control-label">Titre du stage</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "titre" id="titre" value="<?php echo $data['titre'] ;?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_debut" class="col-sm-2 control-label">Date de debut souhaite</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name = "date_debut" id="date_debut" value="<?php echo  $data['date_debut'] ;?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="duree" class="col-sm-2 control-label">Duree</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control"  name="duree" id="duree" value="<?php echo  $data['duree'] ;?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="lieu" class="col-sm-2 control-label">Lieu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name = "lieu" id="lieu" value="<?php echo  $data['lieu'] ;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description"  rows="3"><?php echo  $data['description'] ;?></textarea>
                        <!--<input type="text" class="form-control" id="description" placeholder="description">-->
                    </div>
                </div>

                <div class="form-group">
                    <label for="renumeration" class="col-sm-2 control-label">renumeration</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="renumeration" id="renumeration" value="<?php echo $data['renumeration'] ;?>">
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
                    <label for="etat" class="col-sm-2 control-label">Vous avez trouve un stagaire?</label>
                    <div class="col-sm-10">

                        <label class="radio-inline">
                            <input type="radio" name="etat" value="3"> oui
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="etat"  value="0"> pas encore
                        </label>

                        </div>

                </div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="hidden" name="id_annonce"  value=<?php echo $id_annonce?>>
        <button type="submit" name= "valider" class="btn btn-default">Valider</button>
        <button type="submit" name= "annuler"  class="btn btn-default">Annuler</button>
    </div>

</div>

                <?php }
                mysqli_close($connect);?>
</div>
</div>
</form>

</body>
</html>

