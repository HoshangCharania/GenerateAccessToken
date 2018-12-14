<?php
include_once 'Person.php';

$firstName=$_POST["first_name"];
$lastName=$_POST["last_name"];
$nickname=$_POST["nickname"];
$email=$_POST["email"];
$age=(int)$_POST["age"];
$datetime= new DateTime($_POST["datetime"]);
$datetime= date("Y-m-d");
$zip=(int)$_POST["zip"];
$info=$_POST["info"];
$access_token=$_POST["access_token"];
$newPerson = new Person($firstName,$lastName,$nickname,$email,$datetime,$age,$zip,$info);
$person= $newPerson->add($access_token);
print_r($person);

?>