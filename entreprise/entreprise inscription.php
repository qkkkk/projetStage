<?php session_cache_limiter('private, must-revalidate');
require_once('../connect/connect.php') ?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/styles.css" />
    <script type="text/javascript" src="../script/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../script/jquery.validate.js"></script>
    <script type="text/javascript" src="../script/jquery.form.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form_inscription_entreprise").validate({
                rules: {
                    nom_entreprise: "required",// simple rule, converted to {required:true}
                    email: {// compound rule
                        required: true,
                        email: true
                    },
                    tel: {
                        tel: true
                    },
                    nom_contact: {
                        required: true
                    },
                    fonction: {
                        required: true
                    },
                    site_web: {
                        required: true
                    },
                    adresse: {
                        required: true
                    },

                    ville: {
                        required: true
                    }
                }
            });
        });
    </script>

    <title></title>

</head>

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


    <form id="form_inscription_entreprise" class="form-horizontal" action ="entreprise inscription.php" method="post">
        <div class="container">
        <div class="col-md-8">
            <h2>Inscription</h2>
            <div class="form-group">
                <label for="nom_entreprise" class="col-sm-2 control-label">Nom d'entreprise</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name = "nom_entreprise" id="nom_entreprise" placeholder="Nom d'entreprise">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>


            <div class="form-group">
                <label for="tel" class="col-sm-2 control-label">numero telephone</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="numero telephone">
                </div>
            </div>

            <div class="form-group">
                <label for="nom_contact" class="col-sm-2 control-label">nom du contact</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_contact" id="nom_contact" placeholder="nom du contact">
                </div>
            </div>

            <div class="form-group">
                <label for="fonction" class="col-sm-2 control-label">fonction</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fonction" id="fonction" placeholder="fonction">
                </div>
            </div>

            <div class="form-group">
                <label for="site_web" class="col-sm-2 control-label">site web</label>
                <div class="col-sm-10">
                    <input type="url" class="form-control" name="site_web"
                           id="site_web" placeholder="site web">
                </div>
            </div>

            <div class="form-group">
                <label for="adresse" class="col-sm-2 control-label">adresse</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="adresse">
                </div>
            </div>

            <div class="form-group">
                <label for="ville" class="col-sm-2 control-label">ville</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="ville" id="ville" placeholder="ville">
                </div>
            </div>

            <div class="form-group">
                <label for="cp" class="col-sm-2 control-label">code postale</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cp" id="cp" placeholder="code postale">
                </div>
            </div>
            <div class="form-group">
                <label for="pays" class="col-sm-2 control-label">Pays</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pays" id="pays" placeholder="Pays">
                </div>
            </div>


            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <label for="repassword" class="col-sm-2 control-label">confirmer votre Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="repassword" id="repassword" placeholder="confirmer votre Password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-default">Valider</button>
                </div>

            </div>

        </div>

        </div>
    </form>

<?php
if((isset($_POST['nom_entreprise']))&&
    (isset($_POST['email']))&&
    (isset($_POST['tel']))&&
    (isset($_POST['site_web']))&&
    (isset($_POST['adresse']))&&
    (isset($_POST['ville']))&&
    (isset($_POST['pays']))&&
    (isset($_POST['cp']))&&
    (isset($_POST['nom_contact']))&&
    (isset($_POST['fonction']))&&
    (isset($_POST['password']))&&
    (isset($_POST['repassword']))) {
    if ((!empty($_POST['nom_entreprise'])) &&
        (!empty($_POST['email'])) &&
        (!empty($_POST['tel'])) &&
        (!empty($_POST['site_web'])) &&
        (!empty($_POST['adresse'])) &&
        (!empty($_POST['ville'])) &&
        (!empty($_POST['pays'])) &&
        (!empty($_POST['cp'])) &&
        (!empty($_POST['nom_contact'])) &&
        (!empty($_POST['fonction'])) &&
        (!empty($_POST['password'])) &&
        (!empty($_POST['repassword']))
    ) {
        if ($_POST['password'] == $_POST['repassword']) {
// if(strlen($_POST['password'])>4){

            $req = "select * from entreprise";
            $select = mysqli_query($connect, $req);

            $sql1 = "INSERT INTO entreprise (nom_entreprise,email, tel, site_web, mot_passe)
VALUES
('{$_POST['nom_entreprise']}','{$_POST['email']}', '{$_POST['tel']}', '{$_POST['site_web']}','{$_POST['password']}')";


            if (mysqli_query($connect, $sql1)) {
                echo "reussi";
            } else {
                echo "erreur " . $sql1 . "<br>" . mysqli_error($connect);

            }
            $identifiant = mysqli_insert_id($connect);
            $sql2 = "INSERT INTO adresse (adresse, cp, ville, pays, id_entreprise)
VALUES
('{$_POST['adresse']}','{$_POST['cp']}', '{$_POST['ville']}', '{$_POST['pays']}', $identifiant)";


            $sql3 = "INSERT INTO contact (nom_contact,fonction,id_entreprise )
VALUES
('{$_POST['nom_contact']}','{$_POST['fonction']}', $identifiant)";
            if (mysqli_query($connect, $sql2)) {
                echo "reussi";
            } else {
                echo "erreur " . $sql2 . "<br>" . mysqli_error($connect);

            }

            if (mysqli_query($connect, $sql3)) {
                echo "reussi";
            } else {
                echo "erreur " . $sql3 . "<br>" . mysqli_error($connect);

            }

            header("Location: entreprise.php");
// $_POST['password']= md5($_POST['password']);
//$_POST['repassword']= md5($_POST['repassword']);
        } else echo "les mots de passes ne sont pas identiques";
        // }else echo"le mot de passe tres court";

    } else echo "veuillez saisir tous les champs";
}

?>


</body>
</html>