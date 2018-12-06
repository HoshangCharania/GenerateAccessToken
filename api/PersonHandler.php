<?php
include_once 'Person.php';
 
$firstName=$_POST["first_name"];
$lastName=$_POST["last_name"];
$nickname=$_POST["nickname"];
$access_token=$_POST["access_token"];
$newPerson = new Person($firstName,$lastName,$nickname);
$person= $newPerson->add($access_token);
print_r($person);

?>