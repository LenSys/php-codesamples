<?php
/*
Create Target Array in the Given Order

Given two arrays of integers nums and index. Your task is to create target array under 
the following rules:

Initially target array is empty.
From left to right read nums[i] and index[i], insert at index index[i] the value nums[i] 
in target array. Repeat the previous step until there are no elements to read in nums 
and index. Return the target array.

It is guaranteed that the insertion operations will be valid.

Input: nums = [0,1,2,3,4], index = [0,1,2,2,1]
Output: [0,4,1,3,2]
Explanation:
nums       index     target
0            0        [0]
1            1        [0,1]
2            2        [0,1,2]
3            2        [0,1,3,2]
4            1        [0,4,1,3,2]

Input: nums = [1,2,3,4,0], index = [0,1,2,3,0]
Output: [0,1,2,3,4]
Explanation:
nums       index     target
1            0        [1]
2            1        [1,2]
3            2        [1,2,3]
4            3        [1,2,3,4]
0            0        [0,1,2,3,4]

Input: nums = [1], index = [0]
Output: [1]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index) {
        
        $targetArr = [];
        for($i = 0; $i < count($nums); $i++) {
            $num = $nums[$i];
            $currentIndex = $index[$i];
            
            // insert number at index position without deleting any elements in targetArr
            array_splice($targetArr, $currentIndex, 0, array($num));
        }
        
        return $targetArr;
    }
}

$solution = new Solution();

// Output: [0,4,1,3,2]
echo var_export($solution->createTargetArray([0,1,2,3,4], [0,1,2,2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [0,1,2,3,4]
echo var_export($solution->createTargetArray([1,2,3,4,0], [0,1,2,3,0]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1]
echo var_export($solution->createTargetArray([1], [0]), true) . PHP_EOL;
echo '---' . PHP_EOL;