<?php
namespace membershipprovider;

/**
 * This is a class where it creates and starts session when the user login in the webpage
 * This class can also contain the user Authantication
 */
class MembershipProvider{

  private $user;
  function __construct($user){
    $this->user = $user;
  }

  function login(){
    session_name("usersession");
    session_start();

    $_SESSION['username'] = $this->user->getUsername();

    setcookie('customeruser', $this->user->getUsername(), time()+3600);

  }

}









?>