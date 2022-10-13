<?php
/*
Sum of Unique Elements

You are given an integer array nums. The unique elements of an array are the 
elements that appear exactly once in the array.

Return the sum of all the unique elements of nums.

Input: nums = [1,2,3,2]
Output: 4
Explanation: The unique elements are [1,3], and the sum is 4.

Input: nums = [1,1,1,1,1]
Output: 0
Explanation: There are no unique elements, and the sum is 0.

Input: nums = [1,2,3,4,5]
Output: 15
Explanation: The unique elements are [1,2,3,4,5], and the sum is 15.
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumOfUnique($nums) {
        $numsCountValues = [];
        $numsCount = count($nums);
        
        for($i = 0; $i < $numsCount; $i++) {
            $num = $nums[$i];
            $numsCountValues[$num] = (isset($numsCountValues[$num])) ? $numsCountValues[$num] + 1 : 1;
        }
        
        asort($numsCountValues);
        
        // echo var_export($numsCountValues, true) . PHP_EOL;
        
        $uniqueNums = [];
        foreach($numsCountValues as $num => $numCount) {
            if($numCount === 1) {
                $uniqueNums[] = $num;
            } else {
                // stop foreach loop because the array is sorted by amount (ascending)
                break;
            }
        }
        
        // echo var_export($uniqueNums, true) . PHP_EOL;
        
        return array_sum($uniqueNums);
    }
}

$solution = new Solution();

// Output: 4
echo $solution->sumOfUnique([1,2,3,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->sumOfUnique([1,1,1,1,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 15
echo $solution->sumOfUnique([1,2,3,4,5]) . PHP_EOL;
echo '---' . PHP_EOL;