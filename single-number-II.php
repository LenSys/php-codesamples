<?php
/*
Single Number II

Given an integer array nums where every element appears three times except for one, 
which appears exactly once. Find the single element and return it.

You must implement a solution with a linear runtime complexity and use only constant 
extra space.

Input: nums = [2,2,3,2]
Output: 3

Input: nums = [0,1,0,1,0,1,99]
Output: 99
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        
        $numsCountArr = [];
        foreach($nums as $num) {
            $numsCountArr[$num] = ($numsCountArr[$num] ?? 0) + 1;
        }
        
        asort($numsCountArr);
        
        // echo var_export($numsCountArr, true) . PHP_EOL;
        
        foreach($numsCountArr as $num => $frequency) {
            if($frequency !== 1) {
                continue;
            }
            
            $singleNumber = $num;
            break;
        }
        
        
        return $singleNumber;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->singleNumber([2,2,3,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 99
echo $solution->singleNumber([0,1,0,1,0,1,99]) . PHP_EOL;
echo '---' . PHP_EOL;