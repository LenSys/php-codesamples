<?php
/*
Single Element in a Sorted Array

You are given a sorted array consisting of only integers where every element appears 
exactly twice, except for one element which appears exactly once.
Return the single element that appears only once.

Your solution must run in O(log n) time and O(1) space.

Input: nums = [1,1,2,3,3,4,4,8,8]
Output: 2

Input: nums = [3,3,7,7,10,11,11]
Output: 10
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $numsCountArr = [];
        for($i = 0; $i < count($nums); $i++) {
            $num = $nums[$i];
            
            $numsCountArr[$num] = (isset($numsCountArr[$num])) ? $numsCountArr[$num] + 1: 1;
        }
        
        asort($numsCountArr);
        echo var_export($numsCountArr, true) . PHP_EOL;
        
        $numsCountKeyArr = array_keys($numsCountArr);
        $singleNum = array_shift($numsCountKeyArr);
        
        return $singleNum;
    }
}

$solution = new Solution();

// Output: 2
echo $solution->singleNonDuplicate([1,1,2,3,3,4,4,8,8]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 10
echo $solution->singleNonDuplicate([3,3,7,7,10,11,11]) . PHP_EOL;
echo '---' . PHP_EOL;