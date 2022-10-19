<?php
/*
Longest Continuous Increasing Subsequence

Given an unsorted array of integers nums, return the length of the longest 
continuous increasing subsequence (i.e. subarray). The subsequence must be strictly 
increasing.

A continuous increasing subsequence is defined by two indices l and r (l < r) such 
that it is [nums[l], nums[l + 1], ..., nums[r - 1], nums[r]] and for each 
l <= i < r, nums[i] < nums[i + 1].

Input: nums = [1,3,5,4,7]
Output: 3
Explanation: The longest continuous increasing subsequence is [1,3,5] with length 3.
             Even though [1,3,5,7] is an increasing subsequence, it is not continuous 
             as elements 5 and 7 are separated by element 4.

Input: nums = [2,2,2,2,2]
Output: 1
Explanation: The longest continuous increasing subsequence is [2] with length 1. 
             Note that it must be strictly increasing.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLengthOfLCIS($nums) {
        $l = count($nums);
        $previousNum = PHP_INT_MIN;
        $sequenceArr = [];
        $maxLength = 0;
        
        for($i = 0; $i < $l; $i++) {
            $num = $nums[$i];
            
            // check if current number is higher than the previous number
            if($num > $previousNum) {
                // add number to sequence array
                array_push($sequenceArr, $num);
            } else {
                // current number is not higher than previous number!
                
                // reset sequence array (for next sequence)
                $sequenceArr = [];
                array_push($sequenceArr, $num);
            }
            
            // update previous number
            $previousNum = $num;
            
            // get maximum length
            $maxLength = max($maxLength, count($sequenceArr));
            
            // echo var_export($sequenceArr, true) . PHP_EOL;
        }
        
        return $maxLength;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->findLengthOfLCIS([1,3,5,4,7]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->findLengthOfLCIS([2,2,2,2,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 4
echo $solution->findLengthOfLCIS([1,3,5,7]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 4
echo $solution->findLengthOfLCIS([1,3,5,4,2,3,4,5]) . PHP_EOL;
echo '---' . PHP_EOL;