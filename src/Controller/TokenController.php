<?php
namespace App\Controller;

use App\Api\Token;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TokenController{
    /**
     * Get token from server.
     * 
     * @param boolean $return
     * @return JSON| null
     */
    public static function newToken($return=FALSE){
        $newToken = new Token();
        $token= $newToken->requestToken();
        if($return==TRUE){
            return $token;
        }
        echo $token;
    }
}

