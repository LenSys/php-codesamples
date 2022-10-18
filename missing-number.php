<?php
/*
Missing Number

Given an array nums containing n distinct numbers in the range [0, n], return the 
only number in the range that is missing from the array.

Input: nums = [3,0,1]
Output: 2
Explanation: n = 3 since there are 3 numbers, so all numbers are in the range [0,3]. 
             2 is the missing number in the range since it does not appear in nums.

Input: nums = [0,1]
Output: 2
Explanation: n = 2 since there are 2 numbers, so all numbers are in the range [0,2]. 
             2 is the missing number in the range since it does not appear in nums.

Input: nums = [9,6,4,2,3,5,7,0,1]
Output: 8
Explanation: n = 9 since there are 9 numbers, so all numbers are in the range [0,9]. 
             8 is the missing number in the range since it does not appear in nums.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $n = count($nums);
        $missingNum = -1;
        for($i = 0; $i <= $n; $i++) {
            if(array_search($i, $nums) === false) {
                $missingNum = $i;
                break;
            }
        }
        
        return $missingNum;
    }
}

$solution = new Solution();

// Output: 2
echo $solution->missingNumber([3,0,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->missingNumber([0,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 8
echo $solution->missingNumber([9,6,4,2,3,5,7,0,1]) . PHP_EOL;
echo '---' . PHP_EOL;