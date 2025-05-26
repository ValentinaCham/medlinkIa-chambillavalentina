<?php

function noIterate($strArr)
{
    $N = $strArr[0];
    $K = $strArr[1];
    $lenN = strlen($N);
    $lenK = strlen($K);
    
    // Counting characters in K
    $charCountK = array_count_values(str_split($K));
    
    $left = 0;
    $minLength = PHP_INT_MAX; // Initialize with the maximum possible value
    $result = "";
    $count = 0;
    $charCountWindow = [];
    
    // Initialize character counter in window
    foreach ($charCountK as $char => $cnt) {
        $charCountWindow[$char] = 0;
    }
    
    for ($right = 0; $right < $lenN; $right++) {
        $currentChar = $N[$right];
        
        // If the character is in K, increment its count in the window
        if (isset($charCountK[$currentChar])) {
            $charCountWindow[$currentChar]++;
            
            // Only increment the total counter if we have not exceeded the required count.
            if ($charCountWindow[$currentChar] <= $charCountK[$currentChar]) {
                $count++;
            }
        }
        
        // Attempt to move the left pointer while holding all characters in K
        while ($count == $lenK) {
            $currentWindowLength = $right - $left + 1;
            
            // Update the result if we find a smaller window
            if ($currentWindowLength < $minLength) {
                $minLength = $currentWindowLength;
                $result = substr($N, $left, $currentWindowLength);
            }
            
            $leftChar = $N[$left];
            
            // If the left character is at K, reduce its count
            if (isset($charCountK[$leftChar])) {
                $charCountWindow[$leftChar]--;
                
                // If the count falls below what is needed, decrease the total counter
                if ($charCountWindow[$leftChar] < $charCountK[$leftChar]) {
                    $count--;
                }
            }
            
            $left++;
        }
    }
    
    return $result;
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);