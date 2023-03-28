<?php
namespace membershipprovider;

class MembershipProvider{

    private $user;

    function __construct($user){

        $this->user = $user;

    }

    function login(){

        session_name("hrapp");

        session_start();

        $_SESSION['username'] = $this->user->getUsername();

        setcookie('hrappuser', $this->user->getUsername(), time()+3600);
        
    }

    function isLoggedIn(){

        session_name("hrapp");

        session_start();

        $isLoggedIn = false;

        if(isset($_SESSION)){
            if(isset($_SESSION['username'])){
                if($_SESSION['username'] == $this->user->getUsername()){
                    $isLoggedIn = true;
                }
            }

        }
        
        return $isLoggedIn;

    }

}


?>