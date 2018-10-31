<?php
session_start();

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="cms";

try
{
$connexion = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
$connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $ex)
{
    die($ex -> getMessage());
}
?>