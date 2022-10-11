<?php
/*
Add Two Integers

Given two integers num1 and num2, return the sum of the two integers.

Input: num1 = 12, num2 = 5
Output: 17
Explanation: num1 is 12, num2 is 5, and their sum is 12 + 5 = 17, so 17 is returned.

Input: num1 = -10, num2 = 4
Output: -6
Explanation: num1 + num2 = -6, so -6 is returned.
*/
class Solution {

    /**
     * @param Integer $num1
     * @param Integer $num2
     * @return Integer
     */
    function sum($num1, $num2) {
        return $num1 + $num2;
    }
}

$solution = new Solution();

// Output: 17
echo $solution->sum(12, 5) . PHP_EOL;
echo '---' . PHP_EOL;

echo $solution->sum(-10, 4) . PHP_EOL;
echo '---' . PHP_EOL;