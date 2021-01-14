<?php
    require_once 'db.php';

    function isUserLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function doesUserExistByEmail($email) {
        global $dbConnection;

        $sqlQuery = "SELECT * FROM user WHERE email=:email";
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(':email', $email);
        if($statement->execute()){
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            return $user !==  false;
        }
        return false;
    }

    function findUserByEmailAndPassword($email, $password) {
        global $dbConnection;

        $sqlQuery = "SELECT * FROM user WHERE email=:email AND password=:password";

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

    function storeUserToDatabase(array $user) {
        global $dbConnection;

        $sqlQuery = "INSERT INTO `user` (`full_name`, `email`, `password`) VALUES (:fullName, :email, :password);";

        $encryptedPassword = md5($user['password']);
		
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(":fullName", $user['full_name']);
        $statement->bindParam(":email", $user['email']);
        $statement->bindParam(":password", $encryptedPassword);
            
        if($statement->execute()) {
            return true;
        } else{
            return false;
        }
    }

    function signOut() {
        session_start();
        session_destroy();
    }
?>