<?php



    if(isset($_POST['submit']))

        ?>
        <SCRIPT LANGUAGE="JAVASCRIPT"> alert("Vous devez remplir les champs svp!"); </SCRIPT><?php

        $nom_entreprise = $_POST['nom_entreprise'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $site_web = $_POST['site_web'];
        $ville = $_POST['ville'];
        $cp = $_POST['cp'];
        $password = $_POST['password'];
        $pays = $_POST['pays'];
        $adresse = $_POST['adresse'];


        //if($_POST['password']==$_POST['repassword']){


        // if(strlen($_POST['password'])>4){


        // $_POST['password']= md5($_POST['password']);
        // $_POST['repassword']= md5($_POST['repassword']);

        // $connect= mysqli_connect('localhost', 'root','','gestiondesstages');
        //$req="select* from Entreprise";
        // $select=mysqli_query($connect, $req);
        // $lignes=mysqli_num_rows($select);
        //$identifiant=$lignes;

        // $req= "INSERT INTO Entreprise(id_entreprise, nom_entreprise,email, tel, site_web, mot_passe) VALUES($identifiant, '{$_POST['nom_entreprise']}','{$_POST['email']}', '{$_POST['tel']}', '{$_POST['site_web']}','{$_POST['password']}')";

        // $req2= "INSERT INTO Adresse(adresse, cp, ville, pays, id_entreprise) VALUES('{$_POST['adresse']}','{$_POST['cp']}', '{$_POST['ville']}', '{$_POST['pays']}', '{$_POST['id_entreprise']}')";

        // }//else echo"le mot de passe tres court";

        //}else echo "les mots de passes ne sont pas identiques";


        // } else echo "veuillez saisir tous les champs";


        try {
            $bdd = new PDO('mysql:host=localhost;dbname=gestiondesstages;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// On ajoute une entrée dans la table jeux_video

        $req = $bdd->prepare('INSERT INTO Entreprise( nom_entreprise, email, tel, site_web, mot_pass) VALUES( :nom_entreprise, :email, :tel, :site_web,:mot_pass)');
        $req->execute(array(
            'nom_entreprise' => $nom_entreprise,
            'email' => $email,
            'tel' => $tel,
            'site_web' => $site_web,
            'mot_pass' => $password,
        ));
     $identifiant=mysqli_insert_id($bdd);
        $req2 = $bdd->prepare('INSERT INTO Adress(adresse, cp, ville, pays, id_entreprise) VALUES(  :adresse, :cp, :ville, :pays, :id_entreprise)');
        $req2->execute(array(
            'adresse' => $adresse,
            'cp' => $cp,
            'ville' => $ville,
            'pays' => $pays,
            'id_entreprise' => $id_entreprise,
        ));
        echo 'Le jeu a bien été ajouté !';

?>



