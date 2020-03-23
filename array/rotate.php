<?php

	class Solution {
		function rotate(&$nums,$k) {
			$len = count($nums);
			if ($len == 1) return $len;
			if ($len < 1) return false;

			$k = $k % $len;
			self::reverse(0,$len-1,$nums);
 
			self::reverse(0,$k-1,$nums);

			self::reverse($k,$len-1,$nums);

			// $nums = array_merge(array_splice($nums, -1*$k, $k),$nums);
			// var_dump(array_splice($nums, -1*$k, $k));

		}

		function reverse($start,$end,&$nums) {
			while ($start < $end) {
				list($nums[$start],$nums[$end])  = array($nums[$end],$nums[$start]);
				$start++;
				$end--;
			}

		}

	}

	$solution = new Solution;
	$nums = [1,2,3,4,5,6,7];
	$solution->rotate($nums,1);



?>


	
