<?php
/**
 * Class Auth
 * Used to validate user
 */
require_once 'classes/Connection.php';
class Auth extends Connection
{
public $conn;

public function __construct()
{
    parent::__construct();
    $this->conn=$this->getConnection();
}

/**
 * Validate user login
 * @return bool
 */
public function login(){
    $username=$this->filterFields($_POST['username']);
    $password=$this->filterFields($_POST['password']);
    $result=$this->conn->query("SELECT * FROM customers where username='$username' and password='".md5($password)."'");
    $user=$result->fetch_assoc();
    if($user){
        unset($user['password']);
        $_SESSION["user"] = $user;
        return true;
    }else{
        return false;
    }
}

/**
 * Logout users
 */
public function logout(){
    session_destroy();
    header('Location:index.php');
    exit();
}

/**
 * Check if user is logged in for any page access
 */
public function validateuser(){
    if(!isset($_SESSION["user"])){
        header('Location:index.php');
        exit();
    }
}

/**
 * Used to avoid sql injection for login form
 * @param $value
 * @return string
 */
protected function filterFields($value){
    return $this->conn->real_escape_string($value);
}

/**
 * Get name of logged in customers
 * @return string
 */
public function getName(){
    if(isset($_SESSION["user"])){
       return  $_SESSION["user"]['first_name'].' '.$_SESSION["user"]['last_name'];
    }
}
}