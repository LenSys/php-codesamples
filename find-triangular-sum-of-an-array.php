<?php
/*
Find Triangular Sum of an Array

You are given a 0-indexed integer array nums, where nums[i] is a digit between 
0 and 9 (inclusive).

The triangular sum of nums is the value of the only element present in nums after 
the following process terminates:

Let nums comprise of n elements. If n == 1, end the process. Otherwise, create a 
new 0-indexed integer array newNums of length n - 1.
For each index i, where 0 <= i < n - 1, assign the value of newNums[i] as 
(nums[i] + nums[i+1]) % 10, where % denotes modulo operator.
Replace the array nums with newNums.
Repeat the entire process starting from step 1.
Return the triangular sum of nums.

(see https://leetcode.com/problems/find-triangular-sum-of-an-array/)

Input: nums = [1,2,3,4,5]
Output: 8
Explanation:
                [1, 2, 3, 4, 5]
             -> [  3, 5, 7, 9]
             -> [    8, 2, 6]
             -> [      0, 8]
             -> [        8]
             The above diagram depicts the process from which we obtain the 
             triangular sum of the array.

Input: nums = [5]
Output: 5
Explanation:
             Since there is only one element in nums, the triangular sum is the 
             value of that element itself.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function triangularSum($nums) {
        while(count($nums) > 1) {
            
            $newNums = [];
            $n = count($nums);
            
            for($i = 0; $i < $n - 1; $i++) {
                $val = (($nums[$i] + $nums[$i + 1]) % 10);
                array_push($newNums, $val);
            }
            
            $nums = $newNums;
        }
        
        return $nums[0];
    }
}

$solution = new Solution();

// Output: 8
/*
   [1, 2, 3, 4, 5]
-> [  3, 5, 7, 9]
-> [    8, 2, 6]
-> [      0, 8]
-> [        8]
*/
echo $solution->triangularSum([1,2,3,4,5]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 5
echo $solution->triangularSum([5]) . PHP_EOL;
echo '---' . PHP_EOL;