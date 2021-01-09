<?php
    // define connectoin variables
    $host   = "127.0.0.1"; // 127.0.0.1
    $user       = "root";
    $password   = "";
    $dbName     = "basic_web";

    // create connection
    $dbConnection = null;
    try{
        $dbConnection = new PDO(
                'mysql:host=' . $host . ';dbname=' . $dbName,
                $user,
                $password
            );
    }catch(Exception $e){
        echo "Connection failed: ".$e->getMessage();
        die();
    }
    
    if(!$dbConnection){
        echo "No database connection!";
        die();
    }

    echo "Connected to database! Woohooo!!!";

    // SELECT FROM TABLE USER
    $getUsersSQLQuery = "SELECT * FROM user;";
    $stmt = $dbConnection->query($getUsersSQLQuery);
    $stmt2 = $dbConnection->query($getUsersSQLQuery);
    $usersClass = $stmt->fetchAll(PDO::FETCH_OBJ);
    $usersAssoc = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    var_dump($usersAssoc[0]['first_name']);
    var_dump($usersClass[0]->first_name);

    echo " --- ";

    // INSERT IN DATABASE
    $insertUserSQLQuery = "INSERT INTO `user` 
        (`first_name`, `last_name`, `email`, `password`, `is_blocked`) 
        VALUES ('FILANE_Db', 'FISTEKU_Db', 'test2@gmail.com', '123456', '0');";
    if($dbConnection->exec($insertUserSQLQuery)){
        echo "New user created!";
    }else{
        echo "The user is not created!";
    }

    // UPDATE USER
    $updateUserSQLQuery = "UPDATE user SET is_blocked=1;";
    if($dbConnection->exec($updateUserSQLQuery)){
        echo "Users updated!";
    }else{
        echo "Users not updated!";
    }

    // DELETE USER
    $deleteUserSQLQuery = "DELETE FROM user WHERE email='test@gmail.com'";
    if ($dbConnection->exec($deleteUserSQLQuery)) {
        echo "Users deleted!";
    } else {
        echo "Users not deleted!";
    }

    // CRUD -> CREATE, READ, UPDATE, DELETE
?>