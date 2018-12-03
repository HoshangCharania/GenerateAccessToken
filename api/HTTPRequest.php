<?php 

class HTTPRequest {
    /**
     * @description HTTP Post Request
     * 
     * @param       $url
     * @param       $params
     * @return      HTTP-Response
     */
    public static function HTTPPost($url,$params) {
        $query = http_build_query($params);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}

?>