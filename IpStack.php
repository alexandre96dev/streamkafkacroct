<?php
    class IpStack 
    {
        public function getGeoLocalization($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);

            // Store the data:
            $json = curl_exec($ch);
            curl_close($ch);

            // Decode JSON response:
            $api_result = json_decode($json, true);

            // Output the "capital" object inside "location"
            var_dump($api_result);
        }
    }
    
?>