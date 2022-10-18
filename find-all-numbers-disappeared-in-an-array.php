<?php
/*
Find All Numbers Disappeared in an Array

Given an array nums of n integers where nums[i] is in the range [1, n], return an 
array of all the integers in the range [1, n] that do not appear in nums.

Input: nums = [4,3,2,7,8,2,3,1]
Output: [5,6]

Input: nums = [1,1]
Output: [2]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        $missingNumsArr = [];
        $n = count($nums);
        
        // create a lookup list for all nums
        // -> faster than in_array search
        $numsLookupArr = [];
        for($i = 0; $i < $n; $i++) {
            $num = $nums[$i];
            $numsLookupArr[$num] = true;
        }
        
        for($i = 1; $i <= $n; $i++) {
            // check if current number is set in nums lookup array
            if(!isset($numsLookupArr[$i])) {
                // current number is missing, add to missing numbers array
                array_push($missingNumsArr, $i);
            }
        }
        
        return $missingNumsArr;
    }
}

$solution = new Solution();

// Output: [5,6]
echo var_export($solution->findDisappearedNumbers([4,3,2,7,8,2,3,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [2]
echo var_export($solution->findDisappearedNumbers([1,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;
