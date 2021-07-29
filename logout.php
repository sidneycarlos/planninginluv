<?php
/**
 * Logout le user et redirige vers la page localhost:3009 qui si n'étant pas login renvoie la page de login
 */
    function logOut(){
        session_start();
        setcookie("user", "", time());  
        setcookie("PHPSESSID", "", time());
        header('Location: http://localhost:944');

  }
  logOut();