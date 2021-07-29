<?php
$db = null;
/** accès à la base de données PDO */

function getDB(){
    global $db;
    if(! $db instanceof \PDO){
        $dsn = 'mysql:dbname=PIL;host=172.17.0.1:2021';
        $user= 'root';
        $password = 'root';

        $db = new PDO($dsn, $user, $password);
        
    }
    return $db;  

}
/** création de nos fonctions de requêtes */

 //Récupérer la liste des utilisateurs => retourne la liste de mes amis
 
    function getUsersCards(){

        if(isset($_GET["type"])){
            if($_GET["type"] == "friends"){
                return getFriendsCards(getUserID());
            }
        }
        return getAllUsersCards();        
    }


 //Récupère la clé ID d'un utilisateur 
 
    function getUserID(){

       if(isset($_GET["id"])){

           return $_GET["id"];
       }
       return 0;
    }

/**
 * ******************************************************** * USERS * ******************************************************** * OK
 */

 /**
  * Récupérer les propriétés des users 
  */
    function getUserCards(){
        return getDB()->query('SELECT id, firstname, lastname, logo FROM USER LIMIT 100')->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserProjectsCards($id){
        return getDB()->query("SELECT project_id, project_name FROM PROJECT INNER JOIN USER_PROJECT ON USER_PROJECT.project = PROJECT.project_id WHERE user = $id LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
    }

    function getUserDetails(){
        if (isset($_GET['id'])){
            $userDetailId = $_GET['id'];
            return getDB()->query("SELECT id, firstname, lastname FROM USER WHERE id = $userDetailId ")->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'id nest pas set';
        }
    }
    
    function getUserProjects(){
        if (isset($_GET['id'])){
            $userId = $_GET['id'];
            $reqUserId = getDB()->query("SELECT PROJECT.project_id, PROJECT.project_name, PROJECT.description, PROJECT.start_date, PROJECT.team FROM PROJECT INNER JOIN USER_TEAM ON PROJECT.team = USER_TEAM.team WHERE USER_TEAM.user = $userId")->fetchAll(PDO::FETCH_ASSOC);
            return $reqUserId;
        }
    }


    function getUserTickets(){
        if (isset($_GET['id'])){
            $userId = $_GET['id'];
            $reqUserId = getDB()->query("SELECT TICKET.id, TICKET.ticket_status, TICKET.project_affected, TICKET.tag FROM TICKET INNER JOIN USER_PROJECT ON USER_PROJECT.project = TICKET.project_affected WHERE USER_PROJECT.user=$userId LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
            return $reqUserId;
        }
    }

    /***
     * besoin des équipes dont l'user fait partie => trouver les membres de ces équipes
     
    function gesUserFriends(){
        if (isset($_GET['id'])){
            $userId = $_GET['id'];
            $reqUserId = getDB()->query();
            }
    }
*/

/**
 * ******************************************************** * PROJECTS * ******************************************************** * OK
 */

    
    function getProjectCards(){
        return getDB()->query("SELECT project_id, project_name, description, logo FROM PIL.PROJECT LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
    }

    function getProject($id){
        return getDB()->query("SELECT project_id, project_name, TEAM.name, USER.firstname, USER.lastname, MESSAGE.header FROM PROJECT");
    }

    /**
     * Récupérer la clé id d'un projet spécifique
     */
    function getProjectDetail(){
        if(isset($_GET['id'])){
            $projectId = $_GET['id'];
            return getDB()->query("SELECT project_id, project_name, description, PROJECT.logo, start_date, team, TEAM.name FROM PROJECT INNER JOIN TEAM ON PROJECT.team = TEAM.id WHERE project_id=$projectId")->fetchAll(PDO::FETCH_ASSOC);         
        } else{
           echo "l'id n'est pas isset"; 
        }
        
     }

    function getProjectTicket($id){
        return getDB()->query("SELECT project_id, TICKET.id, TICKET.ticket_status, TICKET.project_affected, TICKET.tag FROM PROJECT INNER JOIN TICKET ON PROJECT.project_id = TICKET.project_affected WHERE project_id=$id LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);

    }

    //TODO
    function getProjectMessage($id){
        

    }
   


/**
 * ******************************************************** * TEAMS * ******************************************************** * OK
 */

    function getTeamCards(){
        return getDB()->query("SELECT id, name, slogan, logo FROM PIL.TEAM LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTeamProjects($id){
        return getDB()->query("SELECT project_id, project_name FROM PROJECT WHERE team = $id LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTeamDetail(){
        if (isset($_GET['id'])){
            $teamId = $_GET['id'];
            return getDB()->query("SELECT id, name FROM TEAM WHERE id = $teamId")->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    function getTeamMembers(){
        if (isset($_GET['id'])){
            $teamId = $_GET['id'];
            $reqTeamId = getDB()->query("SELECT USER.firstname, USER.lastname, USER_TEAM.user, USER_TEAM.team FROM USER_TEAM INNER JOIN USER ON USER_TEAM.user = USER.id WHERE USER_TEAM.team = $teamId")->fetchAll(PDO::FETCH_ASSOC);
            return $reqTeamId;
        }
    }

    function getTeamProject(){
        if (isset($_GET['id'])){
            $teamId = $_GET['id'];
            $reqTeamId = getDB()->query("SELECT PROJECT.project_id, PROJECT.project_name, PROJECT.description, PROJECT.start_date, PROJECT.team, ticket_status, TICKET.tag FROM PROJECT INNER JOIN TICKET ON TICKET.id = PROJECT.project_id WHERE PROJECT.team = $teamId")->fetchAll(PDO::FETCH_ASSOC);
            return $reqTeamId;
        }
    }
    



// Récupère la liste d'amis en fonction de leur id => retourne la liste des users selon qu'ils appartiennent à une team à laquelle l'utilisateur appartient également
 
    function getFriendsCards($id){

        //récupérer les id des team de l'utilisateur passés en paramètre
        $idTeams = getDB()->query("SELECT team FROM USER_TEAM WHERE user = {$id}");
        //pour chaque id récupérer les utilisateurs affectés (filtrer si nécessaire)
        
        getDB()->query('SELECT user FROM');
        //et on retourn la liste des amis
        getDB()->query('SELECT id, firstname FROM PIL.USER WHERE id =' . $id);

        return getDB()->query("SELECT * FROM USER WHERE id=")->fetchAll(PDO::FETCH_ASSOC);

    }
//Récupérer la liste de tous les utilisateurs

    function getAllUsersCards(){

        return getDB()->query("SELECT id, logo, username FROM USER")->fetchAll(PDO::FETCH_ASSOC);

    }

/**
 ********************************************************* * PROJECTS * ********************************************************* 
 */

//Récupérer la liste des projects selon les users
    /*
    function getAllUsersProjects(){
        $teamID = getDB('SELECT team FROM USER_TEAM where user LIKE userId')->query()->fetchAll(PDO::FETCH_ASSOC);
        $friends = getDB()->query('SELECT user FROM USER_TEAM where team like $teamID')->fetchAll(PDO::FETCH_ASSOC);
        getDB()->query()->fetchAll(PDO::FETCH_ASSOC);
        return getDB()->query()->fetchAll(PDO::FETCH_ASSOC);
        //var = SELECT team FROM USER_TEAM where user LIKE $id;
        //var2 = SELECT user FROM USER_TEAM where team like var;
        //SELECT * FROM USER where id like var2;
    }*/


/**
 ********************************************************** * TEAMS * ********************************************************* 
 */
//Récupérer la liste d'id des teams associées à un user

/*function getTeamsId(){
    return getDB()->query('SELECT team FROM USER_TEAM where user LIKE userId')->query()->fetchAll(PDO::FETCH_ASSOC);
}*/


//Récupérer toutes les teams
//Récupérer toutes les teams ordonnées ASC
//Récupérer les users + les noms dans les teams
//Récupérer les noms dans les temas + les projets associés
//Récupérer tous kes projets



//SELECT * FROM PIL.PROJECT INNER JOIN TICKET ON PROJECT.project_id = TICKET.project_affected;
//SELECT USER_TEAM.user AS user_id_in_team, USER.id AS user_id_in_user, USER.username, TEAM.name AS team_name, TEAM.slogan FROM PIL.USER_TEAM INNER JOIN USER ON USER_TEAM.user = USER.id INNER JOIN TEAM ON USER_TEAM.team = TEAM.id;
//SELECT username, team FROM PIL.USER INNER JOIN USER_TEAM ON USER.id = USER_TEAM.user WHERE USER_TEAM.team LIKE 22
//SELECT project_name, description AS project_description, TICKET.id AS ticket_id FROM PIL.PROJECT INNER JOIN TICKET ON project_id = project_affected INNER JOIN USER_PROJECT ON project_id = USER_PROJECT.project WHERE user=3;
//SELECT project_name, team FROM PIL.PROJECT;
//SELECT project_name, team, tag AS ticket_tag, user AS user_id FROM PIL.PROJECT INNER JOIN TICKET ON project_id = project_affected;
//SELECT * FROM PIL.USER;


/**retourne soit l'id de l'utilisateur (minimal) si les credentials sont bons soit false dans le cas contraire*/
    function getUser($username, $password){
        return getdb()->query("SELECT USER.id, USER.username FROM USER WHERE USER.username = '${username}' AND USER.password = '${password}'")->fetch(PDO::FETCH_ASSOC);
    }