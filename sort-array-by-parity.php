<?php
/*
Sort Array By Parity

Given an integer array nums, move all the even integers at the beginning of the 
array followed by all the odd integers.

Return any array that satisfies this condition.

Input: nums = [3,1,2,4]
Output: [2,4,3,1]
Explanation: The outputs [4,2,3,1], [2,4,1,3], and [4,2,1,3] would also be accepted.

Input: nums = [0]
Output: [0]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArrayByParity($nums) {
        $numsCount = count($nums);
        $sortedNumsArr = [];
        
        for($i = 0; $i < $numsCount; $i++) {
            $num = $nums[$i];
            
            // add even numbers to sorted nums array
            if(($num % 2) === 0) {
                $sortedNumsArr[] = $num;
            }
        }
        
        for($i = 0; $i < $numsCount; $i++) {
            $num = $nums[$i];
            
            // add odd numbers to sorted nums array
            if(($num % 2) === 1) {
                $sortedNumsArr[] = $num;
            }
        }
        
        
        return $sortedNumsArr;
    }
}

$solution = new Solution();

// Output: [2,4,3,1]
echo var_export($solution->sortArrayByParity([3,1,2,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [0]
echo var_export($solution->sortArrayByParity([0]), true) . PHP_EOL;
echo '---' . PHP_EOL;