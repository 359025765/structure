<?php
/**
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 * 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 * dp[n] = dp[n-1] + dp[n-2]
 */

function climbStairs($n) {
    $arr = array(1,1);
    for ($i = 2; $i <= $n; $i ++) {
        $arr[$i] = $arr[$i-1] + $arr[$i-2];
    }
    return $arr[$n];
}

echo climbStairs(5);

// 1 1 || 2 || -- 2
// 1 1 1 || 1 2 || 2 1 || -- 3
// 1 1 1 1 || 2 2 || 1 2 1 || 2 1 1 || 1 1 2 || -- 5

