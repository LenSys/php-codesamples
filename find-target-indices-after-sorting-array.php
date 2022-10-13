<?php
/*
Find Target Indices After Sorting Array

You are given a 0-indexed integer array nums and a target element target.
A target index is an index i such that nums[i] == target.
Return a list of the target indices of nums after sorting nums in non-decreasing 
order. If there are no target indices, return an empty list. The returned list must 
be sorted in increasing order.

Input: nums = [1,2,5,2,3], target = 2
Output: [1,2]
Explanation: After sorting, nums is [1,2,2,3,5].
             The indices where nums[i] == 2 are 1 and 2.

Input: nums = [1,2,5,2,3], target = 3
Output: [3]
Explanation: After sorting, nums is [1,2,2,3,5].
             The index where nums[i] == 3 is 3.

Input: nums = [1,2,5,2,3], target = 5
Output: [4]
Explanation: After sorting, nums is [1,2,2,3,5].
             The index where nums[i] == 5 is 4.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function targetIndices($nums, $target) {
        $numsCount = count($nums);
        $targetNumsIndexArr = [];
        
        // sort values ascending
        asort($nums);
        // fix order of keys (from 0-index)
        $nums = array_values($nums);
        
        echo var_export($nums, true) . PHP_EOL;
        
        for($i = 0; $i < $numsCount; $i++) {
            $num = $nums[$i];
            
            // check if num is the target
            if($num === $target) {
                // add index to target array
                $targetNumsIndexArr[] = $i;
            }
        }
        
        return $targetNumsIndexArr;
    }
}

$solution = new Solution();

// Output: [1,2]
echo var_export($solution->targetIndices([1,2,5,2,3], 2), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [3]
echo var_export($solution->targetIndices([1,2,5,2,3], 3), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [4]
echo var_export($solution->targetIndices([1,2,5,2,3], 5), true) . PHP_EOL;
echo '---' . PHP_EOL;