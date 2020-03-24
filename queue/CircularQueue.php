<?php

/**
 * 用数组来模拟队列，约定数组左边出队，右边入队
 * front 指向队列头部第一个有效的数据位置
 * rear 下一个从队尾入队元素的位置
 * 为了避免”队列为空“和”队列未满“的判别条件冲突，我们有意浪费了一个位置（循环数组中任何时刻一定至少有一个位置不存放有效元素）
 * 判别队列为空的条件是：front == rear
 * 判别队列为满的条件是 (rear+1) % len == front。可以这样理解，当rear循环到数组的前面，要从后面追上front，还差一格的时候，判定队列为满
 */
class MyCircularQueue {
    private $queue = [];
    private $len = 0;  // 队列长度
    private $front = 0;
    private $rear = 0; 

    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->len = $k + 1;
    }
  
    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if ($this->isFull()) return false;
        $this->queue[$this->rear] = $value;
        $this->rear = ($this->rear + 1) % $this->len;
        echo $this->rear. "\n";
        return true;
    }
  
    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        if ($this->isEmpty()) return false;
        unset($this->queue[$this->front]);
        $this->front = ($this->front + 1) % $this->len;
        return true;
    }
  
    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        if ($this->isEmpty()) return -1;
        return $this->data[$this->front];
    }
  
    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        if ($this->isEmpty()) return -1;
        // return ($this->rear - 1 + $this->len) % $this->len;
        return $this->queue[($this->rear - 1 + $this->len) % $this->len];
    }
  
    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->front == $this->rear;
    }
  
    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
       return ($this->rear + 1) % $this->len == $this->front;
    }
}

$obj = new MyCircularQueue(3);
$obj->enQueue(1);
$obj->enQueue(2);
$obj->enQueue(3);
$obj->deQueue();
$obj->deQueue();
$obj->deQueue();
$obj->enQueue(4);
// $obj->enQueue(6);
// $obj->enQueue(7);
var_dump($obj, $obj->Rear());
// echo $obj->deQueue();
// var_dump($obj, $obj->Rear());
 