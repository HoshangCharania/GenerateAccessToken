<?php 
namespace App\Api;
class HTTPRequest {
    /**
     * @description HTTP Post Request
     * 
     * @param       url
     * @param       params
     * @param       header
     * @return      HTTP-Response
     */
    public static function HTTPPost($url,$params,$header=null) {
        $query = $params;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($header!=null){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    /**
     * @description HTTP Get Request
     * 
     * @param       url
     * @param       header
     * @return      HTTP-Response
     */
    public static function HTTPGet($url,$header){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($header!=null){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    /**
     * @description HTTP Put Request
     * 
     * @param String $url
     * @param JSON $params
     * @param JSON $header
     * @return HTTP-Response
     */
    public static function HTTPPut($url,$params,$header){
        $query = $params;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        if($header!=null){
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}

?>