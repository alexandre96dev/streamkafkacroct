<?php
    class IpStack 
    {
        public function getGeoLocalization($url)
        {   
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $json = curl_exec($ch);
            curl_close($ch);

            $api_result = json_decode($json, true);

            $arrayGeolocalization = [
                "ip" => $api_result['ip'],
                "latitude" => $api_result['latitude'],
                "longitude" => $api_result['longitude'],
                "country_name" => $api_result['country_name'],
                "region_name" => $api_result['region_name'],
                "city" => $api_result['city']
            ];
            return $arrayGeolocalization;
        }
    }
    
?>