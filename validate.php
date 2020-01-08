<?php
/**
 * Validate login
 */
require_once 'classes/Auth.php';
try {
    $auth= new Auth;
    $status=$auth->login();
    if($status){
        header('Location:customers.php');
        exit();
    }else{
        $_SESSION["err"]='Invalid User';
        header('Location:index.php');
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