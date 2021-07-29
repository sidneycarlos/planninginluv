<?php

/**
 * Vérifie si l'utilisateur est logged. Condition du log = la super globale contient bien une clé user
 * On part du principe qu'on n'est pas log et on démarre la session
 */


function isLogged()
{
    $logged = false;
    session_start();
    if (isset($_SESSION['user'])) {
        $logged = true;
        return $logged;
        var_dump($logged);

        //return $logged;
    }
    if (isset($_COOKIE['user'])) {
        $logged = true;
        return $logged;
        var_dump($logged);
    }
    setcookie("PHPSESSID", "", time());
    return $logged;
}
