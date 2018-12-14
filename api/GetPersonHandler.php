<?php
include_once 'Person.php';

$id=$_GET["id"];
$access_token=$_GET["access_token"];
$person= Person::view($access_token,$id);
echo $person;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

