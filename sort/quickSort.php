<?php
function quickSort($nums) {
    $nums[] = 22;
    $len = count($nums);
    if ($len < 2) return $nums;
    $pivot = $nums[0];
    $less = [];
    $greater = [];
    foreach ($nums as $val) {
        if ($val < $pivot) {
            $less[] = $val;
        }
        if ($val > $pivot) {
            $greater[] = $val;
        }
    }
    $less = quickSort($less);
    $less[] = $pivot;
    $greater = quickSort($greater);
    $arr = array_merge($less,$greater);
    var_dump($less,$greater);
    return $arr;
}


$nums = [5,6,3,9,8,1,4];
$nums = quickSort($nums);
//var_dump($nums);