<?php
/*
Single Number III

Given an integer array nums, in which exactly two elements appear only once and all 
the other elements appear exactly twice. Find the two elements that appear only once. 
You can return the answer in any order.

You must write an algorithm that runs in linear runtime complexity and uses only 
constant extra space.

Input: nums = [1,2,1,3,2,5]
Output: [3,5]
Explanation:  [5, 3] is also a valid answer.

Input: nums = [-1,0]
Output: [-1,0]

Input: nums = [0,1]
Output: [1,0]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function singleNumber($nums) {
        
        $numsCountArr = [];
        
        foreach ($nums as $num) {
            $numsCountArr[$num] = ($numsCountArr[$num] ?? 0) + 1;
        }
        
        asort($numsCountArr);
        
        // echo var_export($numsCountArr, true);
        
        $numOnceArr = [];
        foreach($numsCountArr as $num => $frequency) {
            if($frequency !== 1) {
                continue;
            }
            
            array_push($numOnceArr, $num);
        }
        
        return $numOnceArr;
    }
}

$solution = new Solution();

// Output: [3,5]
echo var_export($solution->singleNumber([1,2,1,3,2,5]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [-1,0]
echo var_export($solution->singleNumber([-1,0]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [0,1]
echo var_export($solution->singleNumber([0,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;