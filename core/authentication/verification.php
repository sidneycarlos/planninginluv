<?php
include ($_SERVER['DOCUMENT_ROOT'] .'/core/DAL/database.php'); //include de fichier
/**
 * implémentation pour la verification de l'utilisateur courant
 * 
 */

 function checkUser($username, $password){
    $user = getUser($username, $password);
    if($user){
        session_start();
        $_SESSION["user"] = $user; // Récupération de la super globale
        $userJson = json_encode($user);
        setcookie("user", $userJson, time()+60, '/');
    } //return $user;
 }

 
 /**
  * qd le script est invoqué on s'assure que la requête vient bien d'un formulaire
  */
 if(isset($_POST['username']) && isset($_POST['password'])){
    checkUser($_POST['username'], $_POST['password']);
    header('Location: http://localhost:944');
    exit();
   
 }
 header('Location: http://localhost:944/login.php');





 