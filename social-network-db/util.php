<?php
    require_once 'db.php';

    function isUserLoggedIn(){
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function doesUserExistByEmail($email){
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

    function findUserByEmailAndPassword($email, $password){
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


    function storeUserToFile(array $user){
        global $dbConnection;

        $sqlQuery = "INSERT INTO `user` 
            (`first_name`, `last_name`, `email`, `password`) 
            VALUES (:firstName, :lastName, :email, :password);";

        $encryptedPassword = md5($user['password']);
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(":firstName", $user['first_name']);
        $statement->bindParam(":lastName", $user['last_name']);
        $statement->bindParam(":email", $user['email']);
        $statement->bindParam(":password", $encryptedPassword);
            
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function signOut(){
        session_start();
        session_destroy();
    }

    //function to store posts in file
    function storePostToFile(array $post, $userId){
        global $dbConnection;

        $sqlQuery = "INSERT INTO `post` (`title`, `description`, `user_id`) 
                        VALUES (:title, :description, :user_id);";

        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(":title", $post['title']);
        $statement->bindParam(":description", $post['description']);
        $statement->bindParam(":user_id", $userId);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function deletePostByIdAndUserId($postId, $userId){
        global $dbConnection;

        $sqlQuery = "DELETE FROM `post` WHERE id=:id AND user_id=:user_id;";
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(":id", $postId);
        $statement->bindParam(":user_id", $userId);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function getPostByIdAndUserId($postId, $userId){
        global $dbConnection;

        $sqlQuery = "SELECT * FROM `post` WHERE id = :post_id AND user_id=:user_id";
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(':post_id', $postId);
        $statement->bindParam(':user_id', $userId);

        if ($statement->execute()) {
            $post = $statement->fetch(PDO::FETCH_ASSOC);
            if($post !== false){
                return $post;
            }
        }
        return null;
    }

    function updatePost($postId, $userId, $title, $description){
        global $dbConnection;

        $sqlQuery = "UPDATE `post` SET `title`=:title, `description`=:description
                        WHERE id=:post_id AND user_id=:user_id;";
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(':post_id', $postId);
        $statement->bindParam(':user_id', $userId);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);

        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function getUserPosts($userId) {
        global $dbConnection;

        $sqlQuery = "SELECT * FROM `post` WHERE `user_id`=:user_id ORDER BY created_at DESC";
        $statement = $dbConnection->prepare($sqlQuery);
        $statement->bindParam(":user_id", $userId);

        if($statement->execute()){
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        }else{
            return [];
        }
    }

function getAllUserPosts()
{
    global $dbConnection;

    $sqlQuery = "SELECT `post`.*, `user`.first_name, `user`.last_name FROM `post` 
                    INNER JOIN `user` ON `user`.id = `post`.user_id
                    ORDER BY created_at DESC";
    $statement = $dbConnection->prepare($sqlQuery);

    if ($statement->execute()) {
        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    } else {
        return [];
    }
}


?>