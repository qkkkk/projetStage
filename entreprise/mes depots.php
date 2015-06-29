<?php require_once('../connect/connect.php') ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
    <script src="../script/ajax.js"></script>
    <script src="../script/jquery.min.js"></script>
    <script src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">

        function validate_required(field,alerttxt)
        {
            with (field)
            {
                if (value==null||value=="")
                {alert(alerttxt);return false}
                else {return true}
            }
        }

        function validate_form(thisform)
        {
            with (thisform)
            {
                if (validate_required(email,"Email must be filled out!")==false)
                {email.focus();return false}
            }
        }
    </script>
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
                <a class="navbar-brand col-sm-1" href="../index/index.php" >
                    <img alt="Brand" src="../images/logo_upmf.jpg">
                </a>
            </div>
            <div class="navbar-text col-sm-4">
                <h1>Plate-forme<br/> Stage</h1>
            </div>
            <div class="navigation navbar-right">
                <p class="navbar-text ">Bonjour,<?php echo $_SESSION['email']; ?></p>
            </div>
            <div id="navbar" class=" navbar-collapse collapse navbar-right">
                <ul class=" nav navbar-nav ">
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
        <li role="presentation"><a href="#">Deposer stage</a></li>
        <li role="presentation"  class="active" ><a href="#" id="depot"  alt="depot" role="button">mes depot </a></li>
        <!--<a href="#" id="depot">mes depot </a> <form action="mes depots.php" method="post" id="depot">
                <button type="text" name="search" id="search" />
            </form>-->
    </ul>



<div class="container">
    <div class="col-md-12" id="mesDepots">

        <h2>mes depots</h2>
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

    </body>
</html>




 */chercher id mes depot

changer cette partie

resp

on click