<?php 

class HTTPRequest {
    /**
     * @description HTTP Post Request
     * 
     * @param       url
     * @param       params
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
}

?>