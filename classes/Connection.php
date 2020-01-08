<?php
/***
 * Database connection class
 * Setup database connection
 */

class Connection
{
public $conn;
public function __construct()
{
    ini_set("display_errors", 0);
    if (!isset($_SESSION)){
        session_start();
    }
    try {
        $this->conn = new mysqli("localhost", "root", "f", "customers");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error().'<br />');
            printf('Please check db details of classes/Connection.php');
            exit();
        }
    }catch(Error $e){
        echo $e->getMessage();
        exit();
    }
    catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}

/**
 * Get Connection details
 * @return mysqli
 */
public function getConnection(){
    return $this->conn;
}

}