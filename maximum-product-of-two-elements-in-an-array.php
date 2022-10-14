<?php
/*
Maximum Product of Two Elements in an Array

Given the array of integers nums, you will choose two different indices i and j of 
that array. Return the maximum value of (nums[i]-1)*(nums[j]-1).

Input: nums = [3,4,5,2]
Output: 12 
Explanation: If you choose the indices i=1 and j=2 (indexed from 0), you will get 
             the maximum value, that is, (nums[1]-1)*(nums[2]-1) = 
             (4-1)*(5-1) = 3*4 = 12. 

Input: nums = [1,5,4,5]
Output: 16
Explanation: Choosing the indices i=1 and j=3 (indexed from 0), you will get the 
             maximum value of (5-1)*(5-1) = 16.

Input: nums = [3,7]
Output: 12
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        
        $n = count($nums);
        $maxProductValue = 0;
        for($i = 0; $i < $n; $i++) {
            for($j = 1; $j < $n; $j++) {
                
                if($i === $j) {
                    continue;
                }
                
                $num_i = $nums[$i];
                $num_j = $nums[$j];
                
                $product = ($num_i - 1) * ($num_j - 1);
                if($product > $maxProductValue) {
                    $maxProductValue = $product;
                }
                
                // echo '(' . $num_i . ',' . $num_j . ') = ' . $product . PHP_EOL;
            }
        }
        
        return $maxProductValue;
    }
}

$solution = new Solution();

// Output: 12
echo $solution->maxProduct([3,4,5,2]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 16
echo $solution->maxProduct([1,5,4,5]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 12
echo $solution->maxProduct([3,7]) . PHP_EOL;
echo '---' . PHP_EOL;