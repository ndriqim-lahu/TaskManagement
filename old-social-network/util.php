<?php
    function isUserLoggedIn(){
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function doesUserExistByEmail($email){
        $users = getUsers();

        foreach($users as $user){
            if($email == $user['email']){
                return true;
            }
        }

        return false;
    }

    function findUserByEmailAndPassword($email, $password){
        $users = getUsers();

        foreach($users as $user){
            if($email == $user['email'] && $password == $user['password']){
                return $user;
            }
        }

        return null;
    }

    function storeUserToFile(array $user){
        $users = getUsers();
        $users[] = $user;
        file_put_contents("users.db", json_encode($users));
    }

    function getUsers(){
        $users = [];

        if (file_exists("users.db")) {
            $fileContent = file_get_contents("users.db");
            $users = json_decode($fileContent, true);
        }

        return $users;
    }

    function signOut(){
        session_start();
        session_destroy();
    }
?>