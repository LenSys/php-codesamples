<?php
/*
XOR Operation in an Array

You are given an integer n and an integer start.
Define an array nums where nums[i] = start + 2 * i (0-indexed) and n == nums.length.
Return the bitwise XOR of all elements of nums.

Input: n = 5, start = 0
Output: 8
Explanation: Array nums is equal to [0, 2, 4, 6, 8] where (0 ^ 2 ^ 4 ^ 6 ^ 8) = 8.
             Where "^" corresponds to bitwise XOR operator.

Input: n = 4, start = 3
Output: 8
Explanation: Array nums is equal to [3, 5, 7, 9] where (3 ^ 5 ^ 7 ^ 9) = 8.
*/
class Solution {

    /**
     * @param Integer $n
     * @param Integer $start
     * @return Integer
     */
    function xorOperation($n, $start) {
        $numsArr = [];
        
        for($i = 0; $i < $n; $i++) {
            $numsArr[$i] = $start + 2 * $i;
        }
        
        // echo var_export($numsArr, true) . PHP_EOL;
        
        $result = 0;
        foreach($numsArr as $num) {
            $result = $result ^ $num;
        }
        
        return $result;
    }
}

$solution = new Solution();

// Output: 8
echo $solution->xorOperation(5, 0) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 8
echo $solution->xorOperation(4, 3) . PHP_EOL;
echo '---' . PHP_EOL;