<?php
namespace App\Controller;
use App\Controller\TokenController;
use App\Api\Person;
use DateTime;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * CRUD functionality for Person. Only Create and Update till now.
 * 
 */
class PersonController{
    /**
     * Get request to the server to obtain create new person form.
     * 
     */
    public static function addGet(){
        require __DIR__.'/../View/person/add.php'; // Not the best way to render something.
    }
    /**
     * 
     * Post request to add a new Person.
     * 
     */
    public static function addPost(){
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
        $newPerson = new Person($firstName,$lastName,$nickname,$email,$datetime,$age,$zip,$info);
        $person= $newPerson->add($access_token);
        echo $person;
    }
    /*
     * @description: There are two ways to do this, either let angular handle it 
     * or let php handle it on the first request itself, I preferred the second one.
     *        
     * @param String $request
     * @return null
     */
    public static function editGet($request){
        $array=explode('/', $request);
        $token = json_decode(TokenController::newToken(TRUE));
        $access_token=$token->access_token;
        $id= (int) $array[3];
        $person= Person::view($access_token,$id);
        if(json_decode($person)->error_message!=null){
            $error=json_decode($person)->error_message;
            require __DIR__.'/../View/error.php';
            return;
        }
        require __DIR__.'/../View/person/edit.php'; // Not the right way to render something, but is decent.
    }
        /**
         * Code smell, when I'm trying to put each and every value, would need to pass this through some method or something else.
         * Also, there is no put in PHP.
         * 
         * Put request for the Person object
         * 
         */
    public static function editPut(){
        $method = $_SERVER['REQUEST_METHOD'];
        if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $_PUT);
            var_dump($_PUT); //$_PUT contains put fields 
        }
        $id=(int) $_PUT["id"];
        $firstName=$_PUT["first_name"];
        $lastName=$_PUT["last_name"];
        $nickname=$_PUT["nickname"];
        $email=$_PUT["email"];
        $age=(int)$_PUT["age"];
        $datetime= new DateTime($_PUT["datetime"]);
        $datetime= date("Y-m-d");
        $zip=(int)$_PUT["zip"];
        $info=$_PUT["info"];
        $access_token=$_PUT["access_token"];
        $newPerson = new Person($firstName,$lastName,$nickname,$email,$datetime,$age,$zip,$info,$id);
        $person= $newPerson->edit($access_token);
        echo $person;
    }
}
