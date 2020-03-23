<?php

class TreeNode {
    public $left;
    public $right;
    public $val;
    public function __construct($val) {
        $this->val = $val;
    }
}


// TODO 前序遍历 根节点->左子树->右子树
function preOrder($treeNode) {
    if (!is_null($treeNode)) {
        $function = __FUNCTION__;
        var_dump($treeNode->val);
        $function($treeNode->left);
        $function($treeNode->right);
    }
}

// TODO 中序遍历 左子树->根节点->右子树
function midOrder($treeNode) {
    if (!is_null($treeNode)) {
        $function = __FUNCTION__;
        $function($treeNode->left);
        var_dump($treeNode->val);
        $function($treeNode->right);
    }
}

// TODO 后序遍历 左子树->右子树->根节点
function afterOrder($treeNode) {
    if (!is_null($treeNode)) {
        $function = __FUNCTION__;
        $function($treeNode->left);
        $function($treeNode->right);
        var_dump($treeNode->val);
    }
}

// TODO 广度优先遍历 层次遍历
function levelOrder($treeNode,$level) {
//    if ($treeNode == null || $level < 1) {
//        return;
//    }

    var_dump($treeNode->val.'====');
    if ($level == 1) {
        var_dump($treeNode->val);
        return;
    }

    if (!is_null($treeNode->left)) {
        levelOrder($treeNode->left,$level-1);
    }

    if (!is_null($treeNode->right)) {
        levelOrder($treeNode->right,$level-1);
    }
}

// TODO 获取最大深度
function maxDepth($treeNode) {
    if (!$treeNode) {
        return 0;
    }
    $left = getLevel($treeNode->left);
    $right = getLevel($treeNode->right);
    return $left < $right ? $right+1 : $left+1;
}

// TODO 获取最小深度
function minDepth($treeNode) {
    if (!$treeNode) return 0;

    if (!$treeNode->left) return minDepth($treeNode->right)+1;
    if (!$treeNode->right) return minDepth($treeNode->left)+1;
    $left = minDepth($treeNode->left);
    $right = minDepth($treeNode->right);

    var_dump("val=" . $treeNode->val . " left=" . $left . " right = " . $right,'***************');
    return min($left,$right)+1;
}

$node1 = new TreeNode(3);
$node2 = new TreeNode(2);
$node3 = new TreeNode(9);
$node4 = new TreeNode(1);
$node5 = new TreeNode(6);
$node6 = new TreeNode(8);
$node7 = new TreeNode(11);
$node8 = new TreeNode(4);
$node9 = new TreeNode(13);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node3->left = $node5;

$node3->right = $node7;
$node4->left = $node6;

$node7->right = $node9;

//preOrder($node1);
//var_dump("============================");
midOrder($node1);
var_dump("============================"); die;
//afterOrder($node1);
//var_dump("============================");

//$level = maxDepth($node1);
$minDepth = minDepth($node1);
var_dump("最小深度为:" . $minDepth);
die;

for ($i=1; $i<=$level; $i++) {
    levelOrder($node1,$i);
}