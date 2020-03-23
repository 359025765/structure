<?php


class Node {
    public $next = null;
    public $val;
    public function __construct($val=null) {
        $this->val = $val;
    }
}

function sortList($headNode)
{
    if ($headNode->next == null) {
        return $headNode;
    }
    $node = $headNode;
    $num = 0;
    while ($node !== null) {
        $num++;
        $node = $node->next;
    }
    $halfNum = intval($num / 2);
    $halfNode = null;
    $node = $headNode;
    for ($i = 0; $i < $halfNum; $i++) {
        $headNode = $node->next;
        if ($i == $halfNum) {
            $node->next = null;
            break;
        }
        $node = $node->next;
    }

    $first = sortList($headNode);
    $second = sortList($halfNode);
    $head = sortMerge($first, $second);
    return $head;
}

function sortMerge($first,$second) {
    if ($first == null) return $second;
    if ($second == null ) return $first;
    if ($first->val > $second->val) {
        $head = $first;
        $node1 = $first;
        $node2 = $second;
    } else {
        $head = $second;
        $node1 = $second;
        $node2 = $first;
    }
    while ($node1 !== null && $node2 !== null) {
        if ($node1->val > $node2->val && $node1->next->val <= $node2->val) {
            $node3 = $node1->next;
            $node1->next = $node2;
            $node4 = $node2->next;
            $node2->next = $node3;
            $node2 = $node4;
        } else {
            $node1 = $node1->next;
        }
    }
    if ($node1 == null && $node2 !== null) {
        $node1->next = $node2;
    }
    return $head;
}


$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(8);
$node4 = new Node(7);
$node5 = new Node(4);
$node6 = new Node(3);
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$node = sortList($node1);
var_dump($node);