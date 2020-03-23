<?php

class Node {
    public $next = null;
    public $val;
    public function __construct($val=null) {
        $this->val = $val;
    }
}

// 反向单链
function reverse($head) {
    if ($head !== null) {
        if ($head->next !== null) {
            $reverList = null;
            $next = null;
            $currentNode  = $head;
        }
    }

    while ($currentNode !== null) {
        $next = $currentNode->next;
        $currentNode->next = $reverList;
        $reverList = $currentNode;
        $currentNode = $next;
    }

    var_dump($reverList);
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
$node3 = new Node(5);
$node4 = new Node(7);
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;

readInNode($node1,2);

//reverse($node1);