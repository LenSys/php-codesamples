<?php
/*
N-Repeated Element in Size 2N Array

You are given an integer array nums with the following properties:

nums.length == 2 * n.
nums contains n + 1 unique elements.
Exactly one element of nums is repeated n times.
Return the element that is repeated n times.

Input: nums = [1,2,3,3]
Output: 3

Input: nums = [2,1,2,5,3,2]
Output: 2

Input: nums = [5,1,5,2,5,3,5,4]
Output: 5
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function repeatedNTimes($nums) {
        $n = count($nums) / 2;
        $numsCount = count($nums);
        
        $numsValueCountArr = [];
        
        for($i = 0; $i < $numsCount; $i++) {
            $num = $nums[$i];
            
            $numsValueCountArr[$num] = (isset($numsValueCountArr[$num])) ? $numsValueCountArr[$num] + 1 : 1;
        }
        
        krsort($numsValueCountArr);
        
        // echo var_export($numsValueCountArr, true) . PHP_EOL;
        
        foreach($numsValueCountArr as $num => $numCount) {
            if($numCount === $n) {
                return $num;
            }
        }
        
        return false;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->repeatedNTimes([1,2,3,3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->repeatedNTimes([2,1,2,5,3,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 5
echo $solution->repeatedNTimes([5,1,5,2,5,3,5,4]) . PHP_EOL;
echo '---' . PHP_EOL;