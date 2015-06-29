<?php require_once('../connect/connect.php') ?>

<?php
$resultat = mysqli_query($connect,"SELECT * FROM formation") or die(mysql_error());
?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
    <title></title>

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
</head>
<body>
<nav class="navbar navbar-default navbar-static ">
    <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <img alt="Brand" src="../images/logo_upmf.jpg">
                </a>
            </div>
            <div class="navbar-text">
                <h1>Plate-forme<br/> Stage</h1>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="../navbar/">Espace Entreprise</a></li>
                    <li><a href="../navbar-static-top/">Espace Etudiant</a></li>
                    <li><a href="./">Espace Professeur<span class="sr-only">(current)</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container">
<div class="col-md-8">
    <h1>Vous êtes entreprise</h1>
    <h2>Formations et Stages du Master IC2A</h2>
<table class="table table-hover table-responsive">
    <tr>
        <th class="col-md-7"> Formation</th>
        <th class="col-md-3"> Date debut</th>
        <th class="col-md-2"> Duree (mois) </th>
    </tr>

        <?php
        while ($data = mysqli_fetch_assoc($resultat)) {
            echo '<tr>';
            echo '<td>'.$data['libelle']. '</td>';
            echo '<td>'.$data['date_debut'].'</td>';
            echo '<td>'.$data['duree'].'</td>';
            echo '</tr>';
        }
        mysqli_close($connect);?>

</table>
    </div>



<form name="reg" action="authentification.php" method="post"  class="form-horizontal">
    <div class="col-md-4">
        <h2>Authentification</h2>
    <div class="form-group">

        <div class="col-sm-12">
            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Password">

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
        <div class="col-sm-8">
            <p>mot de passe oublie</p>
        </div>
    </div>
        <div>
    <p>Vous n'avez pas de compte?</p>
        <div class="col-sm-6">
           <a href="entreprise inscription.php">&nbsp;&nbsp;S'inscrire</a>

            </div>
        <div class="col-sm-6">
            <a href="../poubelle/entreprise%20depot%20stage.html">Depot direct</a>
        </div>
</div>


    </div>
</form>
    </div>


</body>
</html>