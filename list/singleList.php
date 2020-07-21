<?php
require_once 'dump.php';

class Node {
    public $next = null;
    public $val;
    public function __construct($val = null) {
        $this->val = $val;
    }
}

// 反向单链
function reverse($current) {
    $prev = null;
    while ($current != null) {
        $next = $current->next;
        $current->next = $prev;
        [ $prev, $current ] = [ $current, $next ];
        var_dump($prev);
    }
}

// 查找链表的中间值
function middleNode($list) {
    $fast = $slow = $list;
    while ($fast && $fast->next && $fast->next->next) {
        $fast = $fast->next->next;
        $slow = $slow->next;
    }
    var_dump($slow->val);
}

function checkNodeLoop($list) {
    $slow = $fast = $list; $loop = false;

    while ($fast && $fast && $fast->next && $fast->next->next) {
        $fast = $fast->next->next;
        $slow = $slow->next;
        if ($fast->val == $slow->val) $loop = true; break;
    }
    var_dump($loop);
}


// 构建单链表 头插法
function headInsert($n) {
    $head = new Node();
    for ($i=$n; $i >= 1; $i--) {
       $node = new Node($i);
       $head->val = $node->val;
       $node->next = $head->next;
       $head->next = $node;
    }
    var_dump($head->next);
}

//headInsert(4);

// 构建单链表 尾插法
function rearInsert($n) {
    $rear = new Node();
    for ($i=1; $i <= $n; $i++) {
        $node = new Node($i);
        $rear->val = $node->val;
        $node->next = $rear->next;
        $rear->next = $node;
    }
    var_dump($rear);
}
//rearInsert(6);

// 读取链表中第i个元素
function readInNode($list,$i) {
    if ($list == null || $i <= 0) die('输入参数有误');
    $node = new Node(0);
    $node->next = $list;
    $next = $node;
    $j = 1;

    while ($next && $j <= $i) {
        $next = $next->next;
        $j++;
    }

    if ($next == null) die('i长度大于链表长度');
    $val = $next->val;
    var_dump($val);
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(4);
$node4 = new Node(5);
$node5 = new Node(8);
$node6 = new Node(9);
$node7 = new Node(10);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$node6->next = $node7;
$node7->next = $node3;

// reverse($node1);
checkNodeLoop($node1);