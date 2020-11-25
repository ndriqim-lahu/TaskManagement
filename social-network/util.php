<?php
    function isUserLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    function doesUserExistByEmail($email) {
        $users = getUsers();

        foreach($users as $user) {
            if($email == $user['email']) {
                return true;
            }
        }
        return false;
    }

    function findUserByEmailAndPassword($email, $password) {
        $users = getUsers();

        foreach ($users as $user) {
            if($email == $user['email'] && $password == $user['password']) {
                return $user;
            }
        }
        return null;
    }

    function storeUserToFile(array $user) {
        $users = getUsers();
        $users[] = $user;
        file_put_contents("users.db", json_encode($users));
    }

    function getUsers() {
        $users = [];

        if (file_exists("users.db")) {
            $fileContent = file_get_contents("users.db");
            $users = json_decode($fileContent, true);
        }
        return $users;
    }

    function signOut() {
        session_start();
        session_destroy();
    }

    function storePostToFile(array $post) {
        $posts = getPosts();
        $posts[] = $post;
        file_put_contents("posts.db", json_encode($posts));
    }

    function getPosts() {
        $posts = [];

        if (file_exists("posts.db")) {
            $postContent = file_get_contents("posts.db");
            $posts = json_decode($postContent, true);
        }
        return $posts;
    }

    function getUserPosts($email) {
        $posts = getPosts();
        $users_posts = [];
        foreach ($posts as $post) {
            if ($post['user_email'] == $email) {
                $users_posts[] = $post;
            }
        }
        return array_reverse($users_posts);
    }
?>