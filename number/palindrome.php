<?php
/**
 * User: chenjiaxing
 * Date: 2020/8/14
 * Time: 11:09 上午
 * Email: star359025765@gmail.com
 */

/*
 *  判断一个整数是否是回文数
 */
class Solution {
    public function isPalindrome(int $x) {
        if ($x < 0 || ($x % 10 == 0 && $x != 0)) return false;
        $revertedNumber = 0;
        while ($x > $revertedNumber) {
            $revertedNumber = $revertedNumber * 10 + $x % 10;
            $x = intval( $x / 10);
            // n x
            // 1 10.1
            // 10 1.01
            var_dump($revertedNumber, $x);
        }
//        var_dump($x, $revertedNumber);
        return $x == $revertedNumber || $x == $revertedNumber / 10;
    }

//    public function isPalindrome2(int $s) : bool {
//        $s2 = (int)strrev($s . '');
//        return $s2 == $s;
//    }

}

$solution = new Solution();
$x = 1;
$check1 = $solution->isPalindrome(1221);
//$check2 = $solution->isPalindrome2($x);
var_dump($check1);
