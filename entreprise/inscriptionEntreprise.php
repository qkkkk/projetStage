<?php

if(isset($_POST['submit'])){

    //if($_POST['nom_entreprise']&&$_POST['email']&&$_POST['tel']&&$_POST['site_web']&&$_POST['ville']&&$_POST['cp']&&$_POST['nom_entreprise']&&$_POST['password']&&$_POST['repeatpassword']){
        if($_POST['password']==$_POST['repassword']){
            if(strlen($_POST['password'])>4){


                $_POST['password']= md5($_POST['password']);
                $_POST['repassword']= md5($_POST['repassword']);

                $connect= mysqli_connect('localhost', 'root','','gestiondesstages');
                $req="select* from Entreprise, Adresse";
                $select=mysqli_query($connect, $req);
                $lignes=mysqli_num_rows($select);
                $identifiant=$lignes;

                $reg= "INSERT INTO Entreprise(id_entreprise, nom_entreprise,email, tel, site_web, mot_passe) VALUES($identifiant, '{$_POST['nom_entreprise']}','{$_POST['email']}', '{$_POST['tel']}', '{$_POST['site_web']}','{$_POST['password']}')";

                $reg2= "INSERT INTO Adresse(adresse, cp, ville, pays, id_entreprise) VALUES('{$_POST['adresse']}','{$_POST['cp']}', '{$_POST['ville']}', '{$_POST['pays']}', '{$_POST['id_entreprise']}')";
                   if(mysqli_query($connect,$req)){
                      echo "reussi";
                   }else {echo"erreur ".$req."<br>".mysqli_error($connect);

                   }
                if(mysqli_query($connect,$req2)){
                    echo "reussi";
                }else {echo"erreur ".$req2."<br>".mysqli_error($connect);

                }

            }else echo"le mot de passe tres court";

        }else echo "les mots de passes ne sont pas identiques";


   // } else echo "veuillez saisir tous les champs";




}
