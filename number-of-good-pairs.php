<?php
/*
Number of Good Pairs

Given an array of integers nums, return the number of good pairs.

A pair (i, j) is called good if nums[i] == nums[j] and i < j.

Input: nums = [1,2,3,1,1,3]
Output: 4
Explanation: There are 4 good pairs (0,3), (0,4), (3,4), (2,5) 0-indexed.

Input: nums = [1,1,1,1]
Output: 6
Explanation: Each pair in the array are good.

Input: nums = [1,2,3]
Output: 0
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums) {
        $countGoodPairs = 0;
    
        for($i = 0; $i < count($nums); $i++) {
            $num1 = $nums[$i];

            for($j = ($i + 1); $j < count($nums); $j++) {
                $num2 = $nums[$j];

                // check if first number is the same as the second number
                // (-> good pair)
                if($num1 == $num2) {
                    $countGoodPairs++;
                }
            }
        }

        return $countGoodPairs;
    }
}

$solution = new Solution();

// Output: 4
echo $solution->numIdenticalPairs([1,2,3,1,1,3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 6
echo $solution->numIdenticalPairs([1,1,1,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->numIdenticalPairs([1,2,3]) . PHP_EOL;
echo '---' . PHP_EOL;