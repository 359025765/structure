<?php

class Solution {
    public function merge(&$nums1, $m, $nums2, $n) {
        $p = $m + $n - 1;
        $n--; $m--;
        while(($m >= 0) && ($n >= 0)) {
            $nums1[$p--] = $nums1[$m] < $nums2[$n] ? $nums2[$n--] : $nums1[$m--];
        }
    }
}


$s = new Solution();
$nums1 = [1,2,3,0,0,0];
$m = 3;
$nums2 = [2,5,6];
$n = 2;
$s->merge($nums1, $m, $nums2, $n);
var_dump($nums1);
