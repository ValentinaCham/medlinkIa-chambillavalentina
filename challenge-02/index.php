<?php

function noIterate($strArr)
{
    $n = $strArr[0];
    $k = $strArr[1];
    $need = array_count_values(str_split($k));
    $have = [];
    $needCount = count($need);
    $haveCount = 0;
    $left = 0;
    $minLen = PHP_INT_MAX;
    $strArr = "";

    for ($right = 0; $right < strlen($n); $right++) {
        $char = $n[$right];
        if (isset($need[$char])) {
            $have[$char] = ($have[$char] ?? 0) + 1;
            if ($have[$char] == $need[$char]) {
                $haveCount++;
            }
        }

        while ($haveCount == $needCount) {
            if (($right - $left + 1) < $minLen) {
                $minLen = $right - $left + 1;
                $strArr = substr($n, $left, $minLen);
            }
            $leftChar = $n[$left];
            if (isset($need[$leftChar])) {
                $have[$leftChar]--;
                if ($have[$leftChar] < $need[$leftChar]) {
                    $haveCount--;
                }
            }
            $left++;
        }
    }
    // code goes here
    return $strArr;
}

// keep this function call here
echo noIterate(["ahffaksfajeeubsne", "jefaa"]);