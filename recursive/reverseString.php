<?php

class Solution {
    public function reverseString(&$nums,$start,$end) {
        if ($start < $end) {
            list($nums[$start],$nums[$end]) = array($nums[$end],$nums[$start]);
            $start++;
            $end--;
            self::reverseString($nums,$start,$end);
        }
        return $nums;
    }


}

$solution = new Solution;
$nums = ["h","e","l","l","o"];
$len = count($nums);
if ($len <=1 ) return $nums;
$solution->reverseString($nums,0,$len-1);
var_dump($nums);