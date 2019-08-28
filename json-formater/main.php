<?php

    function get_data($array) {
        $json = '';
        $index = 0;
        
        $json .= "[";
        foreach ($array as $key => $value) {
            $json .= "'{";
            $json .= '"type":"' . $key . '",';
            
            $json .= '"value":[';
            foreach ($value as $index1 => $value1) {
                if ($index1 == sizeof($value) - 1) {
                    $json .= '"' . $value1 . '"';
                } else {
                    $json .= '"' . $value1 . '", ';
                }
                
            }
            
            if ($index == sizeof($array) - 1) {
                $json .= ']';
                $json .= "}'";
            } else {
                $json .= ']';
                $json .= "}', ";
            }
            $index++;
        }
        $json .= ']';
        
        return $json;
    }
    
    $array = array("gateway"=>array("bkash"), "currency"=>array("usd", "cad"));
    
    echo var_dump(get_data($array));
