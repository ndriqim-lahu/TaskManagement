<?php

class User {
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    public function __construct($firstName, $lastName, $email, $password){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }

    public static function UserWithFirstAndLastName($firstName, $lastName){
        $user = new User($firstName, $lastName, null, null);
        return $user;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function printUser(){
        echo $this->firstName."|".$this->lastName."|".$this->email."|".$this->password;
    }

    public function getFirstName(){
        return $this->firstName;
    }

}

$user = new User("Filane", "Fisteku", "filane@gmail.com", "123456");
$user->printUser();
echo "<br>";
echo $user->getFirstName();

$user2 = User::UserWithFirstAndLastName("Filan", "Fisteku");
echo "<br>";
$user2->printUser();
?>