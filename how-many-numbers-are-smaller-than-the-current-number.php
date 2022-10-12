<?php
/*
How Many Numbers Are Smaller Than the Current Number

Given the array nums, for each nums[i] find out how many numbers in the array are 
smaller than it. That is, for each nums[i] you have to count the number of valid j's 
such that j != i and nums[j] < nums[i].

Return the answer in an array.

Input: nums = [8,1,2,2,3]
Output: [4,0,1,1,3]
Explanation: 
             For nums[0]=8 there exist four smaller numbers than it (1, 2, 2 and 3). 
             For nums[1]=1 does not exist any smaller number than it.
             For nums[2]=2 there exist one smaller number than it (1). 
             For nums[3]=2 there exist one smaller number than it (1). 
             For nums[4]=3 there exist three smaller numbers than it (1, 2 and 2).

Input: nums = [6,5,4,8]
Output: [2,1,0,3]

Input: nums = [7,7,7,7]
Output: [0,0,0,0]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums) {
        $countNumsSmaller = [];
        for($i = 0; $i < count($nums); $i++) {
            $num = $nums[$i];
            $countNumsSmaller[$i] = 0;

            // iterate through each number in nums array
            for($j = 0; $j < count($nums); $j++) {
                if($nums[$j] === $num) {
                    continue;
                }

                // count numbers smaller than num
                if($nums[$j] < $num) {
                    $countNumsSmaller[$i]++;
                }
            }
        }

        return $countNumsSmaller;
    }
}

$solution = new Solution();

// Output: [4,0,1,1,3]
echo var_export($solution->smallerNumbersThanCurrent([8,1,2,2,3]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [2,1,0,3]
echo var_export($solution->smallerNumbersThanCurrent([6,5,4,8]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [0,0,0,0]
echo var_export($solution->smallerNumbersThanCurrent([7,7,7,7]), true) . PHP_EOL;
echo '---' . PHP_EOL;