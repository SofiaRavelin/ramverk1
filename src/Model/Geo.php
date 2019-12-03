<?php

namespace Anax\Model;

/**
 * A model class retrievieng data from external server
 *
 */
class Geo
{

    public function getGeo($ipAdress) : array

{
    $url = "http://api.ipstack.com/$ipAddress?access_key=65f8ad3d16f5c5edf327482a4a78396b";
    $res = file_get_contents($url);
    $geo = json_decode($res, true);
    return $geo;
}

//public function indexGeo($ipAdress) : array
//{
//    //$data = $this->getGeo($ipAdress);


//    $isValid = filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;


//    if ($isValid) {
//        $protocol = filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? "IPv4" : "IPv6";
//        $domain = gethostbyaddr($ipAddress);
//    }

//    return;
//}
/**

  * This method takes one argument:

  * A string that we are going to check if its a valid ip-adress.

  * Returning an json with some information.

  *

  * @param string $value

  *

  * @return array

  */

public function Nu($ipAddress) : array

    {
        $url = "http://api.ipstack.com/$ipAddress?access_key=65f8ad3d16f5c5edf327482a4a78396b";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $res = json_decode($data, true);
        //var_dump($ipAddress);
        //var_dump($res);
        //$domain = gethostbyaddr($ipAddress)
        //$res['protocol'] = filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? "IPv4" : "IPv6";
        //$res['domain'] = $domain;
        //$res['isValid'] = filter_var($ipAddress, FILTER_VALIDATE_IP) ? true : false;
        return $res;
    }

}
