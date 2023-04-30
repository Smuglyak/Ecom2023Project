<?php
namespace models;

require_once(dirname(__DIR__)."/core/dbconnectionmanager.php");

class User{
 
  public $user_id;
  private $fname;
  private $lname;
  private $username;
  private $password;
  private $address;
  private $email;
  private $phone_num;
  private $user_points;
  private $wallet; 

  private $dbConnection;

  private $membershipProvider;
  function __construct(){
    //Initiate an object from DBConnectionmanager class
     $conManager = new \database\DBConnectionManager();
    //set this variable to get the connection from DBConnectionmanager Object called conManager
    $this->dbConnection = $conManager->getConnection();
  }

  function createUser(){

    //TODO: check if the created user exists.
    //use the username instead
    $query = "INSERT INTO user(fname, lname, username, password, address, email, phone_num, user_points, wallet) VALUES(:fname, :lname, :username, :password, :address, :email, :phone_num, :user_points, :wallet)";
    $statement = $this->dbConnection->prepare($query);
    //User points should be 0 when creating a user
    $DEFAULT_USER_POINTS = 0;
    //Hashed the password which encrypts inserted text password
    $hashedPass = password_hash($this->password, PASSWORD_DEFAULT);
    return $statement->execute([
      'fname' => $this->fname,'lname' => $this->lname, 'username' => $this->username,'password' => $hashedPass,
        'address' => $this->address, 'email' => $this->email,'phone_num' => $this->phone_num, 'user_points' => $DEFAULT_USER_POINTS,'wallet' => $this->wallet
        ]);
  }

  /**
   * This function checks if password corresponds or matches with the entered username
   */
  function login(){

    $dbPass = $this->getPasswordByUsername();
    return password_verify($this->password, $dbPass);

  }

  /**
   * A functioin that gets User Object based on username on that way we can get its other attributes such as user_id, password etc. 
   */
    function getUserByUsername($username){
      $query = "SELECT * FROM user WHERE username = :username";

      $statement = $this->dbConnection->prepare($query);
      
      $statement->execute(['username'=> $username]);

      //Fetches all rows as User object.
      return $statement->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

  /**
   * A function that gets that finds user's password in db
   */
  function getPasswordByUsername(){
    $query = "SELECT password FROM user WHERE username = :username";

    $statement = $this->dbConnection->prepare($query);

    $statement->execute(['username' => $this->username]);
    //This fetchColumn will retreives the username which is located in first column in the first row
    return $statement->fetchColumn(0);
  
  }

  /**
   * A function that gets the membershipProvider 
   *  
   */

   function getMemberShipProvider(){
    return $this->membershipProvider;
   }


  // Setter for $fname property
  public function setFname($fname) {
    $this->fname = $fname;
  }

  // Getter for $fname property
  public function getFname() {
    return $this->fname;
  }

  // Setter for $lname property
  public function setLname($lname) {
    $this->lname = $lname;
  }

  // Getter for $lname property
  public function getLname() {
    return $this->lname;
  }

  // Setter for $username property
  public function setUsername($username) {
    $this->username = $username;
  }

  // Getter for $username property
  public function getUsername() {
    return $this->username;
  }

  // Setter for $password property
  public function setPassword($password) {
    $this->password = $password;
  }

  // Getter for $password property
  public function getPassword() {
    return $this->password;
  }

  // Setter for $address property
  public function setAddress($address) {
    $this->address = $address;
  }

  // Getter for $address property
  public function getAddress() {
    return $this->address;
  }

  // Setter for $email property
  public function setEmail($email) {
    $this->email = $email;
  }

  // Getter for $email property
  public function getEmail() {
    return $this->email;
  }

  // Setter for $phone_num property
  public function setPhoneNum($phone_num) {
    $this->phone_num = $phone_num;
  }

  // Getter for $phone_num property
  public function getPhoneNum() {
    return $this->phone_num;
  }

  // Setter for $user_points property
  public function setUserPoints($user_points) {
    $this->user_points = $user_points;
  }

  // Getter for $user_points property
  public function getUserPoints() {
    return $this->user_points;
  }

  // Setter for $wallet property
  public function setWallet($wallet) {
    $this->wallet = $wallet;
  }

  // Getter for $wallet property
  public function getWallet() {
    return $this->wallet;
  }


}
?>