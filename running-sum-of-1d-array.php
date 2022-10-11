<?php
/*
Running Sum of 1d Array

Given an array nums. We define a running sum of an array as runningSum[i] = 
sum(nums[0]…nums[i]).

Return the running sum of nums.

Input: nums = [1,2,3,4]
Output: [1,3,6,10]
Explanation: Running sum is obtained as follows: [1, 1+2, 1+2+3, 1+2+3+4].

Input: nums = [1,1,1,1,1]
Output: [1,2,3,4,5]
Explanation: Running sum is obtained as follows: [1, 1+1, 1+1+1, 1+1+1+1, 1+1+1+1+1].

Input: nums = [3,1,2,10,1]
Output: [3,4,6,16,17]
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums) {
        $runningSum = [];
        $sum = 0;
        
        for($i = 0; $i < count($nums); $i++) {
            $sum += $nums[$i];
            $runningSum[] = $sum;
        }
        
        return $runningSum;
    }
}

$solution = new Solution();

// Output: [1,3,6,10]
echo var_export($solution->runningSum([1,2,3,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,2,3,4,5]
echo var_export($solution->runningSum([1,1,1,1,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [3,4,6,16,17]
echo var_export($solution->runningSum([3,1,2,10,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;