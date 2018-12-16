<?php
require 'vendor/autoload.php';
use App\Controller\PersonController;
use App\Controller\TokenController;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$request = $_SERVER['REDIRECT_URL'];
switch ($request) {
    
    case ((preg_match('^\/person\/add[\/]?$^', $request) ? true : false) && ($_SERVER['REQUEST_METHOD']=="GET")):
        PersonController::addGet();
        break;
    case ((preg_match('^\/person\/add[\/]?$^', $request) ? true : false) && ($_SERVER['REQUEST_METHOD']=="POST")):
        PersonController::addPost();
        break;
    case ((preg_match('^\/person\/edit\/[0-9]+[\/]?$^', $request) ? true : false) && ($_SERVER['REQUEST_METHOD']=="GET")) :
        PersonController::editGet($request);
        break;
    case ((preg_match('^\/person\/edit\/[0-9]+[\/]?$^', $request) ? true : false) && ($_SERVER['REQUEST_METHOD']=="PUT")) :
        PersonController::editPut();
        break;
    case ((preg_match('^\/token\/new[\/]?$^', $request) ? true : false) && ($_SERVER['REQUEST_METHOD']=="GET")) :
        TokenController::newToken();
        break;
    default :
        $error= "Are you searching for the right thing?";
        require 'src/View/error.php';
        break;
}