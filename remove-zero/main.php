<?php

    function remove_zero($num) {
        $numNoZero = ''; // O(1)
        $numEndZero = '';  // O(1)
        $numStartZero = '';  // O(1)
        
        $start = false; // O(1)
        $end = false; // O(1)
        
        $sIndex = 0; // O(1)
        $eIndex = 0; // O(1)
        
        for ($i = 0; $i < strlen($num); $i++) {  // O(nStart + (nStart - nEnd))
            if ($start && $end) break;
            
            if ($num[$i] != 0 && !$start) {
                $sIndex = $i;
                $start = true;
            }
            
            if ($num[strlen($num) - 1 - $i] != 0 && !$end) {
                $eIndex = strlen($num) - 1 - $i;
                $end = true;
            }
        }
        
        $numNoZero = substr($num, $sIndex, $eIndex - (strlen($num) - 1)); // O(1) 
        $numEndZero = substr($num, $sIndex); // O(1) 
        $numStartZero = substr($num, 0, $eIndex - (strlen($num) - 1)); // O(1) 
        
        return $numNoZero . ' ' . $numEndZero . ' ' . $numStartZero; // O(1) 
        
    }
    
    echo remove_zero('000892021.2408000');
