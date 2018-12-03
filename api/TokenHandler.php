<?php
include_once 'Token.php';

$requestedVal=$_GET["access"];
if($requestedVal=="token"){
    $newToken = new Token();
    $token= $newToken->requestToken();
    echo $token;
}

?>