<?php
/*
Min Stack

Design a stack that supports push, pop, top, and retrieving the minimum element in 
constant time.

Implement the MinStack class:

MinStack() initializes the stack object.
void push(int val) pushes the element val onto the stack.
void pop() removes the element on the top of the stack.
int top() gets the top element of the stack.
int getMin() retrieves the minimum element in the stack.
You must implement a solution with O(1) time complexity for each function.

Input
["MinStack","push","push","push","getMin","pop","top","getMin"]
[[],[-2],[0],[-3],[],[],[],[]]

Output
[null,null,null,null,-3,null,0,-2]

Explanation
            MinStack minStack = new MinStack();
            minStack.push(-2);
            minStack.push(0);
            minStack.push(-3);
            minStack.getMin(); // return -3
            minStack.pop();
            minStack.top();    // return 0
            minStack.getMin(); // return -2
*/
class MinStack {
    private $stackArr;
    
    /**
     */
    function __construct() {
        $this->stackArr = [];
    }
  
    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        array_push($this->stackArr, $val);
    }
  
    /**
     * @return NULL
     */
    function pop() {
        array_pop($this->stackArr);
    }
  
    /**
     * @return Integer
     */
    function top() {
        $l = count($this->stackArr);
        return $this->stackArr[$l - 1];
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return min($this->stackArr);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */

$minStack = new MinStack();
$minStack->push(-2);
$minStack->push(0);
$minStack->push(-3);

echo $minStack->getMin() . PHP_EOL; // return -3

$minStack->pop();

echo $minStack->top() . PHP_EOL;    // return 0
echo $minStack->getMin() . PHP_EOL; // return -2