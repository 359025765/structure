<?php

class Node {
    public $next = null;
    public $val;
    public function __construct($val) {
        $this->val = $val;
    }
}

function sortList($headNode) {
    if (!$headNode->next) return $headNode;
    $node = $headNode;
    $num = 0;
    while ($node !== null) {
        $num++;
        $node = $node->next;
    }

    $halfNum = intval($num / 2);
    $halfNode = null;
    $node = $headNode;
    for ($i=0; $i < $halfNum; $i++) {
        $halfNode = $node->next;
        if ($i == $halfNum) {
            $node->next = null;
            break;
        }
        $node = $node->next;
    }
    var_dump($halfNode,$headNode,$node);
//    $first = sortList($headNode);
//    $second = sortList($halfNode);
}



// 链表两两节点互换
function swaPairs($head) {
    $node = new Node(0);
    $node->next = $head;
    $q = $node;
    while ($q->next && $q->next->next) {
        $node1 = $q->next;
        $node2 = $node1->next;
        $next = $node2->next;

        $node1->next = $next;
        $node2->next = $node1;

        $q->next = $node2;
        $q = $node1;
    }
    var_dump($node);
}

/* ----------------------------------------- */

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(5);
$node4 = new Node(7);
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
//sortList($node1)；
//swaPairs($node1);



