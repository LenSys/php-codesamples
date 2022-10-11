<?php
/*
Shuffle the Array

Given the array nums consisting of 2n elements in the form 
[x1,x2,...,xn,y1,y2,...,yn].

Return the array in the form [x1,y1,x2,y2,...,xn,yn].

Input: nums = [2,5,1,3,4,7], n = 3
Output: [2,3,5,4,1,7] 
Explanation: Since x1=2, x2=5, x3=1, y1=3, y2=4, y3=7 then the answer is [2,3,5,4,1,7].

Input: nums = [1,2,3,4,4,3,2,1], n = 4
Output: [1,4,2,3,3,2,4,1]

Input: nums = [1,1,2,2], n = 2
Output: [1,2,1,2]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n) {
        $ansNums = [];
        
        for($i = 0; $i < $n; $i++) {
            $ansNums[] = $nums[$i];
            $ansNums[] = $nums[$i + $n];
        }
        
        return $ansNums;
    }
}

$solution = new Solution();

// Output: [2,3,5,4,1,7]
echo var_export($solution->shuffle([2,5,1,3,4,7], 3), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,4,2,3,3,2,4,1]
echo var_export($solution->shuffle([1,2,3,4,4,3,2,1], 4), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,2,1,2]
echo var_export($solution->shuffle([1,1,2,2], 2), true) . PHP_EOL;
echo '---' . PHP_EOL;