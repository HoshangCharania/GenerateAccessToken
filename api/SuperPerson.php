<?php

include_once 'Person.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SuperPerson extends Person{
    function __construct($firstName,$lastName,$nickname){
            $this->firstName=$firstName;
            $this->lastName=$lastName;
            $this->nickname=$nickname;
        }
    function getFirstName(){
            return "SuperMan";
        }
}


?>