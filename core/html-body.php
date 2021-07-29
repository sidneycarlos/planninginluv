<?php
/**
 * on décide que page sera le début de l'uri. Vérification que page existe bien dans l'uri.
 * Si oui on fait un traitement qui permettra d'exclure certains caractères
 * et d'afficher la page correspondant à un fichier du serveur en fonction de la condition
 */

if (isset($_GET['page'])) {
    $content = $_GET['page'];
    $folder = explode("-", $content)[0];
    $folder = (strrpos($folder, "s") == strlen($folder) - 1) ? $folder : $folder . "s";
    if (is_file(("./pages/$folder/$content" . ".php"))) {
        include("./pages/$folder/$content" . ".php");
    } else {
        include("./404.php");
    }
} else {
    include('./pages/dashboard.php');
}
