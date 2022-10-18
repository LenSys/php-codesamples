<?php
/*
Find the Middle Index in Array

Given a 0-indexed integer array nums, find the leftmost middleIndex (i.e., the 
smallest amongst all the possible ones).

A middleIndex is an index where nums[0] + nums[1] + ... + nums[middleIndex-1] == 
nums[middleIndex+1] + nums[middleIndex+2] + ... + nums[nums.length-1].

If middleIndex == 0, the left side sum is considered to be 0. Similarly, if 
middleIndex == nums.length - 1, the right side sum is considered to be 0.

Return the leftmost middleIndex that satisfies the condition, or -1 if there is no 
such index.

Input: nums = [2,3,-1,8,4]
Output: 3
Explanation: The sum of the numbers before index 3 is: 2 + 3 + -1 = 4
The sum of the numbers after index 3 is: 4 = 4

Input: nums = [1,-1,4]
Output: 2
Explanation: The sum of the numbers before index 2 is: 1 + -1 = 0
The sum of the numbers after index 2 is: 0

Input: nums = [2,5]
Output: -1
Explanation: There is no valid middleIndex.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMiddleIndex($nums) {
        
        $l = count($nums);
        $middleIndex = -1;
        for($i = 0; $i < $l; $i++) {
            $leftNumsArr = array_slice($nums, 0, $i);
            $rightNumsArr = array_slice($nums, $i + 1, $l);
                
            // echo 'left: ' . var_export($leftNumsArr, true) . PHP_EOL;
            // echo 'right: ' . var_export($rightNumsArr, true) . PHP_EOL;
            
            $leftNumsSum = array_sum($leftNumsArr);
            $rightNumsSum = array_sum($rightNumsArr);
            
            // echo $leftNumsSum . ' ' . $rightNumsSum . PHP_EOL;
            
            if($leftNumsSum === $rightNumsSum) {
                $middleIndex = $i;
                break;
            }
        }
        
        return $middleIndex;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->findMiddleIndex([2,3,-1,8,4]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->findMiddleIndex([1,-1,4]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -1
echo $solution->findMiddleIndex([2,5]) . PHP_EOL;
echo '---' . PHP_EOL;