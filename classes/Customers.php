<?php
/**
 * Customer Management Class
 */
require_once 'classes/Connection.php';

class Customers extends Connection
{
    public $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn=$this->getConnection();
    }

    /**
     * Get All customers for logged in users
     * @return bool|mixed
     */
    public function getCustomers(){
        $result=$this->conn->query("SELECT * FROM customers LEFT JOIN customer_location on (customers.id=customer_location.customer_id)");
        $customers=$result->fetch_all(MYSQLI_ASSOC);
        if($customers){
            return $customers;
        }else{
            return false;
        }
    }

}