<?php

/*
 * 使用hash求交集
 */
function intersect(array $nums1, array $nums2): array {
    if (count($nums1) > count($nums2)) {
        return intersect($nums2, $nums1);
    }
    $map = [];
    foreach ($nums1 as $v) {
        $map[$v] = $map[$v] ? $map[$v] + 1 : 1;
    }

    $res = [];
    foreach ($nums2 as $v) {
        if ($map[$v] > 0) {
            array_push($res, $v);
            $map[$v] -= 1;
        }
    }
    return $res;
}

/*
 * 最优解
 */
function intersect2(array $nums1, array $nums2) : array {
    $intersectArr = $nums1Arr = [];
    foreach ($nums1 as $num1) {
        if (!isset($nums1Arr[$num1])) {
            $nums1Arr[$num1] = 0;
        }
        $nums1Arr[$num1] ++;
    }
    foreach ($nums2 as $num2) {
        if (isset($nums1Arr[$num2])) $nums1Arr[$num2] -= 1;
        $intersectArr[] = $num2;
    }
    return $intersectArr;
}

/*
 * 当传入的数组是有序的
 */
function intersect3(array $nums1, array $nums2) : array {
    sort($nums1); sort($nums2);
    $i = $j = $k = 0;
    while ($i < count($nums1) && $j < count($nums2)) {
        if ($nums1[$i] > $nums2[$j]) {
            ++$j;
        } elseif ($nums1[$i] < $nums2[$j]) {
            ++$i;
        } else {
            $nums1[$k++] = $nums1[$i++];
            ++$j;
        }
    }
    return array_slice($nums1, 0, $k);
}

$nums2 = [2,3]; $nums1 = [1,1,2,2,3,4];
$res1 = intersect($nums1, $nums2);
$res2 = intersect2($nums1, $nums2);
$res3 = intersect3($nums1, $nums2);
var_dump($res3);

