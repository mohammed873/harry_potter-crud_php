<?php
$conix = new mysqli("localhost","root","","php_crud");

if($conix->connect_error){
    die("Could not connect to the database" .$conix->connect_error);
}

?>