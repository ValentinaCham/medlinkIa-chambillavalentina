<?php

function findPoint($strArr)
{
    $list1 = array_map('trim', explode(',', $strArr[0]));
    $list2 = array_map('trim', explode(',', $strArr[1]));

    $intersection = array_intersect($list1, $list2);

    if (empty($intersection)) {
        return 'false';
    }

    sort($intersection);

    return implode(',', $intersection);
}

// keep this function call here
echo findPoint(['1, 3, 4, 7, 13', '1, 2, 4, 13, 15']);