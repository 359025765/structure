<?php

class TreeNode {
    public $left;
    public $right;
    public $val;
    public function __construct($val) {
        $this->val = $val;
    }
}

// TODO 插入节点
function nodeInsert($treeNode,$data) {
    $newNode = new TreeNode($data);
    if ($treeNode == null) {
        return $newNode;
    }
    $current = $treeNode;
    $current = $current->right;
    $current->right = 0;

    while ($current !== null) {
        $node = $current;
        if ($current->val > $data) {
            $current = $current->left;
            if ($current == null) {
                $node->left = $newNode;
                break;
            }
        } else {
            $current = $current->right;
            if ($current == null) {
                $node->right = $newNode;
                break;
            }
        }
    }
    var_dump($treeNode);
}

// TODO 获取节点最大值 查找右子树最大子节点即可
function maxNode($treeNode) {
    $current = $treeNode;
   while (!is_null($current)) {
       $max = $current->val;
       $current = $current->right;
   }
   var_dump($max); die;
}


// TODO 最大深度
function maxDepth($treeNode) {
    if (is_null($treeNode)) return 0;
    if (!is_null($treeNode)){
        return max(maxDepth($treeNode->left),maxDepth($treeNode->right))+1;
    }
}


// TODO 删除子节点
function delNode($treeNode,$val) {
    $current = $treeNode;
    $parent = null;
    while ($current->val != $val) {
        $parent = $current;
        if ($val > $current->val) {
            $current = $current->right;
            $currentLeft = 0;
        } else {
            $current = $current->left;
            $currentLeft = 1;
        }
        if (!$current) {
            return false;
        }
    }

    // TODO 当删除的节点没有子节点
    if ($current->right == null && $current->left == null) {
        $current->val = null;
    }

    // TODO 当删除的节点只有一个节点
    if ($current->right == null && $current->left != null) {
        if ($currentLeft === 0) {
            $parent->right = $current->left;
        } else {
            $parent->left = $current->left;
        }
    }

    if ($current->left == null && $current->right != null) {
        if ($currentLeft === 0) {
            $parent->right = $current->right;
        } else {
            $parent->left = $current->right;
        }
    }

    // TODO 当删除的节点有两个节点
        if ($current->left !== null && $current->right !== null) {
            $node = $current->right;
//            $right = $current->right;
            while ($node->left !== null) {
                $node = $node->left;  // 找到删除节点的后继节点
            }

            $node->left = $current->left;
            $node->right = $current->right;
            if ($currentLeft === 1) {
                $parent->left = $node;
            } else {
                $parent->right = $node;
            }

            var_dump($treeNode);
        }
}

$node1 = new TreeNode(13);
$node2 = new TreeNode(8);
$node3 = new TreeNode(19);
$node4 = new TreeNode(6);
$node5 = new TreeNode(9);
$node6 = new TreeNode(16);
$node7 = new TreeNode(20);
$node8 = new TreeNode(4);
$node9 = new TreeNode(10);
$node10 = new TreeNode(14);
$node11 = new TreeNode(7);
$node12 = new TreeNode(11);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;
$node3->left = $node6;
$node3->right = $node7;

$node4->left = $node8;
$node4->right = $node9;

$node6->left = $node10;

$node9->left = $node11;
$node9->right = $node12;

//nodeInsert($node1,14);
delNode($node1,6);

