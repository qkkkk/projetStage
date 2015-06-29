<?php require_once('../connect/connect.php') ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <title></title>
</head>
<script type="text/javascript">
$(document).ready(function(){
        $(".choix").hide();
    });

  $("#update").click(function(){

    $(".choix").show();
} );

    function showok(){
        $(".choix").show();
    }


</script>
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
                <p class="navbar-text navbar-right">Bonjour,<?php echo $_SESSION['login']; ?></p>
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

<div class="container">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">dépôts des entreprises </a></li>
        <li role="presentation" ><a href="#">Deposer stage</a></li>
        <li role="presentation"><a href="#">mes depot </a></li>
    </ul>


    <div class="container">
        <div class="col-md-12">

            <h2>dépôts des entreprises</h2>
            <table class="table table-hover table-responsive">
                <tr>
                    <th class="col-md-2"> titre </th>
                    <th class="col-md-1"> entreprise </th>
                   <!-- <th class="col-md-1"> email </th>
                    <th class="col-md-1"> contact </th>-->
                    <th class="col-md-1"> date debut souhaite</th>
                    <!--<th class="col-md-1"> date de depot </th>-->
                    <th class="col-md-1"> Duree (mois) </th>
                    <!-- <th class="col-md-1"> description </th>
                    <th class="col-md-1"> ficher </th>-->
                    <th class="col-md-1"> technologies utilisees </th>
                    <th class="col-md-1"> type de traveaux </th>
                    <th class="col-md-1"> renumeration </th>
                    <th class="col-md-1"> validation ou refuse </th>
                    <th class="col-md-3"> choix </th>
                </tr>

                <?php
                // $email=$_SESSION['email'];
                // $query = "SELECT nom_entreprise FROM  stage S, entreprise E WHERE S.id_entreprise=E.id_entreprise" or die(mysql_error());
                //  $result = mysqli_query($connect,$query);
                //  while ($data = mysqli_fetch_assoc($result)) {
                // echo $data['nom_entreprise'];
                //$id_entreprise = $data['id_entreprise'];
                $query2 = "SELECT * FROM stage ";
                $result2 = mysqli_query($connect, $query2);
                while ($data2 = mysqli_fetch_assoc($result2)) {
                    echo '<tr>';
                    echo '<td>' . $data2['titre'] . '</td>';
                    $id_entreprise = $data2['id_entreprise'];
                    $query = "SELECT nom_entreprise,email FROM  entreprise  WHERE id_entreprise= $id_entreprise" or die(mysql_error());
                    $result = mysqli_query($connect,$query);
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo '<td>' . $data['nom_entreprise'] . '</td>';
                       // echo '<td>' . $data['email'] . '</td>';
                    }
                    $query = "SELECT nom_contact FROM  contact  WHERE id_entreprise= $id_entreprise" or die(mysql_error());
                    $result = mysqli_query($connect,$query);
                    while ($data = mysqli_fetch_assoc($result)) {
                       // echo '<td>' . $data['nom_contact'] . '</td>';
                    }
                    echo '<td>' . $data2['date_debut'] . '</td>';
                   // echo '<td>' . $data2['date_publication'] . '</td>';
                    echo '<td>' . $data2['duree'] . '</td>';
                   // echo '<td>' . $data2['description'] . '</td>';
                   // echo '<td>' . $data2['ficher'] . '</td>';
                    echo '<td>' . $data2['nom_type_traveaux'] . '</td>';
                    echo '<td>' . $data2['nom_technologies'] . '</td>';
                    echo '<td>' . $data2['renumeration'] . '</td>';
                    if ($data2['valide']==0) {
                        echo '<td> en attente </td>';
                    }
                    elseif  ($data2['valide']==1) {
                        echo  '<td> valide en ligne </td>';
                    }
                    elseif  ($data2['valide']==2) {
                        echo  '<td> refuse </td>';
                    }
                    elseif  ($data2['valide']==3) {
                        echo  '<td> stagaire trouve </td>';
                    }



                     if($data2['valide']==0 ) {
                         echo'<td>
            <form name="reg" action="validation.php" method="post"  class="form-horizontal">
                <input type="hidden" name="id_annonce"  value="'.$data2['id_stage'] .'">
                <label class="radio-inline" class="col-md-4">
                    <input type="radio" name="'.$data2['id_stage'] .'"  value="valide" > valide
                </label>
                <label class="radio-inline" class="col-md-4">
                    <input type="radio" name="'.$data2['id_stage'] .'"  value="refuse" > refuse
                </label>
                <div class="form-group" >
                    <div class="col-md-4">
                        <button type="submit"  class="btn btn-default" >ok</button>
                    </div>
                </div>
            </form>
        </td>';}
                    elseif($data2['valide']==1||$data2['valide']==2) {
                        echo'<td>

                        <button   onclick="showok()" class="btn btn-default">modifier</button>

        </td>';}


                    echo'<td>
            <form class ="choix" name="reg" action="validation.php" method="post"  class="form-horizontal">
                <input type="hidden" name="id_annonce"  value="'.$data2['id_stage'] .'">
                <label class="radio-inline">
                    <input type="radio" name="'.$data2['id_stage'] .'"  value="valide"> valide
                </label>
                <label class="radio-inline">
                    <input type="radio" name="'.$data2['id_stage'] .'"  value="refuse"> refuse
                </label>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit"  class="btn btn-default">ok</button>
                    </div>
                </div>
            </form>
        </td>';

                    echo '</tr>';
                    // }
                }
                mysqli_close($connect);?>

            </table>
        </div>

<!--

-->
</body>
</html>