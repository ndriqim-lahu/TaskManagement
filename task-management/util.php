<?php
    require_once 'db.php';

    function isUserLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function findUserByEmailAndPassword($email, $password) {
        global $dbConnection;

        $sqlQuery = "SELECT * FROM user WHERE email=:email
                         AND password=:password";

        $encryptedPassword = md5($password);
        
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $encryptedPassword);

        if ($statement->execute()) {
           $user = $statement->fetch(PDO::FETCH_ASSOC);
           if($user !== false){
                return $user;
           }
        }
        return null;
    }
?>