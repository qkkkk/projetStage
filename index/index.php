<?php require_once('../connect/connect.php') ?>

<?php
$resultat = mysqli_query($connect,"SELECT count(DISTINCT nom_entreprise) as total FROM entreprise") or die(mysql_error());
?>

<?php
$resultat2 = mysqli_query($connect,"SELECT count(DISTINCT id_stage) as total2 FROM stage") or die(mysql_error());

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
            <a class="navbar-brand" href="index.php">
                <img alt="Brand" src="../images/logo_upmf.jpg">
            </a>
         </div>
         <div class="navbar-text">
             <h1>Plate-forme<br/> Stage</h1>
         </div>
         <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="../entreprise/entreprise.php">Espace Entreprise</a></li>
            <li><a href="../navbar-static-top/">Espace Etudiant</a></li>
            <li ><a href="../enseignant/enseignant%20index.html">Espace Professeur<span class="sr-only">(current)</span></a></li>
        </ul>
         </div>
    </div>
        </div>
</nav>


<div class="jumbotron">
    <div class="container">
    <h1>BIENVENUE SUR LA PLATEFORME DE STAGES DE L'UPMF
       </h1>
    <p> Vous allez pouvoir prendre contact avec des entreprises </p>
    <ul>

        <li> 6 Entreprises</li>


        <li> 6 offres de stage</li>
    </ul>
    </div>
</div>

</body>
</html>