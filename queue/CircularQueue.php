<?php
class MyCircularQueue {
    private $queue = [];
    private $len = 0;
    private $cap = 0;
    private $frone = 0;  // 队首
    private $rear = 0;  // 队尾

    /**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k) {
        // else $this->k = $k;
        $this->k = $k;
    }
  
    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if ($this->len !== $this->k) {

            // if ($index = array_search(false, $this->queue)) {
            //     $this->queue[$index] = $value;
            // } else {
            //     array_push($this->queue, $value);
            // }
            $this->len++;
        } else {
            return false;
        }
    }
  
    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        $len = count($this->queue) - 1;
        $index = array_search(false, $this->queue);
        if ($index) unset($this->queue[$index]);
        else unset($this->queue[$len]);
        return true;
    }
  
    /**
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        return $this->queue[0] ?? false;
    }
  
    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        $len = count($this->queue) - 1;
        return $this->queue[$len] ?? false;
    }
  
    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return empty($this->queue) ?: false;
    }
  
    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
        $len = count($this->queue);
        if ($len === $this->k) return true;
        else return false;
    }
}

$obj = new MyCircularQueue(3);
$obj->enQueue(1);
$obj->enQueue(2);
$obj->enQueue(3);
$obj->deQueue();
$obj->enQueue(4);
var_dump($obj->enQueue(5555), $obj, $obj->Rear());
// echo $obj->deQueue();
// var_dump($obj, $obj->Rear());
 