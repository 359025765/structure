<?php
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function minIncrementForUnique($A) {
   		sort($A);
   		$tmp = 0;
   		$min = min($A);
   		for ($i=1; $i < count($A); $i++) {
            if ($A[$i] <= $A[$i-1]) {
                $tmp += $A[$i-1]-$A[$i]+1;
                $A[$i] = $A[$i-1]+1;
            }
        }
   		var_dump($tmp);
    }
}


$solution = new Solution;
$solution->minIncrementForUnique([0,2,2,2]);

