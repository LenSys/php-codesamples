<?php
/*
Concatenation of Array

Given an integer array nums of length n, you want to create an array ans of length 2n 
where ans[i] == nums[i] and ans[i + n] == nums[i] for 0 <= i < n (0-indexed).

Specifically, ans is the concatenation of two nums arrays.

Return the array ans.

Input: nums = [1,2,1]
Output: [1,2,1,1,2,1]
Explanation: The array ans is formed as follows:
             - ans = [nums[0],nums[1],nums[2],nums[0],nums[1],nums[2]]
             - ans = [1,2,1,1,2,1]

Input: nums = [1,3,2,1]
Output: [1,3,2,1,1,3,2,1]
Explanation: The array ans is formed as follows:
             - ans = [nums[0],nums[1],nums[2],nums[3],nums[0],nums[1],nums[2],nums[3]]
             - ans = [1,3,2,1,1,3,2,1]
*/

use Solution as GlobalSolution;

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function getConcatenation($nums) {
        $numsCopy = $nums;
        
        for($i = 0; $i < count($nums); $i++) {
            $numsCopy[] = $nums[$i];
        }
        
        return $numsCopy;
    }
}

$solution = new Solution();
// Output: [1,2,1,1,2,1]
echo var_export($solution->getConcatenation([1,2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,3,2,1,1,3,2,1]
echo var_export($solution->getConcatenation([1,3,2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;