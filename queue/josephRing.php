<?php
/**
 * User: chenjiaxing
 * Date: 2020/7/20
 * Time: 12:04 下午
 * Email: star359025765@gmail.com
 */

/**
 * @param $n
 * @param $m
 */
function ring($n, $m) {
    $queue = [];
    for ($i = 1; $i <= $n; $i++) {
        $queue[] = $i;
    }
    $k = 2;
    $i = 0;
//    for (; $i < $k; $i++) {
//        $element = array_shift($queue);
//        $queue[] = $element;
//    }
    $i = 1;
    var_dump($queue);
    while (count($queue) > 0) {
        $element = array_shift($queue);
        if ($i < $m) {
            $queue[] = $element;
            $i ++;
        } else {
//            var_dump($i, $element, $queue);
            $i = 1;
            echo 'call ' . $element . PHP_EOL;
            var_dump($queue);
        }
    }
}
ring(10, 5);