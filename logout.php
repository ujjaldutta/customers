<?php
/**
 * Used for logout
 */
require_once 'classes/Auth.php';
$auth= new Auth;
$auth->logout();
