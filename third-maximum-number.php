<?php
/*
Third Maximum Number

Given an integer array nums, return the third distinct maximum number in this array. 
If the third maximum does not exist, return the maximum number.

Input: nums = [3,2,1]
Output: 1
Explanation:
             The first distinct maximum is 3.
             The second distinct maximum is 2.
             The third distinct maximum is 1.

Input: nums = [1,2]
Output: 2
Explanation:
             The first distinct maximum is 2.
             The second distinct maximum is 1.
             The third distinct maximum does not exist, so the maximum (2) is returned 
             instead.

Input: nums = [2,2,3,1]
Output: 1
Explanation:
             The first distinct maximum is 3.
             The second distinct maximum is 2 (both 2's are counted together since 
             they have the same value).
             The third distinct maximum is 1.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function thirdMax($nums) {
        // remove duplicate nums
        $nums = array_unique($nums);
        
        // get first max number
        $firstMaxNumber = max($nums);
        $firstMaxNumberIndex = array_search($firstMaxNumber, $nums);
        
        $num = $firstMaxNumber;
        if($firstMaxNumberIndex !== false) {
            unset($nums[$firstMaxNumberIndex]);
            
            if(count($nums) > 0) {
                // get second max number
                $secondMaxNumber = max($nums);
                $secondMaxNumberIndex = array_search($secondMaxNumber, $nums);

                if($secondMaxNumberIndex !== false) {
                    unset($nums[$secondMaxNumberIndex]);

                    if(count($nums) > 0) {
                        // get third max number
                        $thirdMaxNumber = max($nums);

                        $num = $thirdMaxNumber;
                    }
                }
            }
        }
        
        return $num;
    }
}

$solution = new Solution();

// Output: 1
echo $solution->thirdMax([3,2,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->thirdMax([1,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->thirdMax([2,2,3,1]) . PHP_EOL;
echo '---' . PHP_EOL;