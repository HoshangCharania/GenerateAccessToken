<?php

/* 
 *
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Person.php';

$id=$_POST["id"];
$firstName=$_POST["first_name"];
$lastName=$_POST["last_name"];
$nickname=$_POST["nickname"];
$email=$_POST["email"];
$age=(int)$_POST["age"];
$datetime= new DateTime($_POST["datetime"]);
$datetime= date("Y-m-d");
$zip=$_POST["zip"];
$info=$_POST["info"];
$access_token=$_POST["access_token"];
$newPerson = new Person($firstName,$lastName,$nickname,$email,$datetime,$age,$zip,$info,$id);
$person= $newPerson->edit($access_token);
print_r($person);



