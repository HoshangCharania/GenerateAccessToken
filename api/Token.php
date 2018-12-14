<?php
include_once 'HTTPRequest.php';
class Token
	{
        
        /**
         * Token Class,
         * As the variables required to be json encoded and are also static,
         * I placed them in getters, and as there are no changes there would
         * be no setters
         * 
         */

        /**
         * You coud usually set up your pre processed details here.
         */

        function __construct(){
            
        }
        /**
         * @description Get Base 64 encoded Header
         * @return String
         */
        protected function getHeader(){
            $header=json_encode(["alg" => "HS256","typ"=> "JWT"]);
            $header=str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
            return $header;
        }
        /**
         * @description Get Base 64 encoded Payload
         * @return String
         */
        protected function getPayload(){
            $payload=json_encode(["iss" => "bba692f8df96b981f176d07fe4342ec3ad4acbfd",
            "aud" => "https://app.iformbuilder.com/exzact/api/oauth/token",
            "exp" => time()+500,
            "iat" => time()]);
            $payload=str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
            return $payload;
        }
        /**
         * @description Get base 64 encooded Signature
         * @param $header 
         * @param $payload 
         * @return String
         */
        protected function getSignature($header,$payload){
            $clientSignature="32047df376735794f0dc05c5550a9852ef5d6c10";
            $hashedSignature = hash_hmac('sha256', $header . "." . $payload, $clientSignature, true);
            $signature=str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($hashedSignature));
            return $signature;
        }
        /**
         * @description get Token
         * @return String
         */
        protected function getJWT(){
            $header=$this->getHeader();
            $payload=$this->getPayload();
            $signature=$this->getSignature($header,$payload);
            $jwt = $header . "." . $payload . "." . $signature;
            return $jwt;
         }
         /**
          *  @description request Token
          *
          */
         function requestToken(){
            $jwt=$this->getJWT();
            $request= new HTTPRequest();
            $url="https://app.iformbuilder.com/exzact/api/oauth/token";
            $params=["grant_type" => "urn:ietf:params:oauth:grant-type:jwt-bearer", "assertion"=>$jwt];
            $token=$request->HTTPPost($url,http_build_query($params));
            return $token;
         }
		
    } 
    
?>