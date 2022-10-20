<?php
/*
Fibonacci Number

The Fibonacci numbers, commonly denoted F(n) form a sequence, called the Fibonacci 
sequence, such that each number is the sum of the two preceding ones, starting from 
0 and 1. That is,

F(0) = 0, F(1) = 1
F(n) = F(n - 1) + F(n - 2), for n > 1.
Given n, calculate F(n).

Input: n = 2
Output: 1
Explanation: F(2) = F(1) + F(0) = 1 + 0 = 1.

Input: n = 3
Output: 2
Explanation: F(3) = F(2) + F(1) = 1 + 1 = 2.

Input: n = 4
Output: 3
Explanation: F(4) = F(3) + F(2) = 2 + 1 = 3.
*/
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        
        if($n === 0) {
            // Fib(0) = 0
            return 0;
        } else if($n === 1) {
            // Fib(1) = 1
            return 1;
        } else {
            // Fib(n) = Fib(n - 1) + Fib(n - 2)
            return $this->fib($n - 1) + $this->fib($n - 2);
        }
    }
}

$solution = new Solution();

// Output: F(2) = F(1) + F(0) = 1 + 0 = 1
echo $solution->fib(2) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: F(3) = F(2) + F(1) = 1 + 1 = 2
echo $solution->fib(3) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: F(4) = F(3) + F(2) = 2 + 1 = 3
echo $solution->fib(4) . PHP_EOL;
echo '---' . PHP_EOL;