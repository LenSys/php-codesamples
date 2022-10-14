<?php
/*
Sign of the Product of an Array

There is a function signFunc(x) that returns:

1 if x is positive.
-1 if x is negative.
0 if x is equal to 0.
You are given an integer array nums. Let product be the product of all values 
in the array nums.

Return signFunc(product).

Input: nums = [-1,-2,-3,-4,3,2,1]
Output: 1
Explanation: The product of all values in the array is 144, and signFunc(144) = 1

Input: nums = [1,5,0,2,-3]
Output: 0
Explanation: The product of all values in the array is 0, and signFunc(0) = 0

Input: nums = [-1,1,-1,1,-1]
Output: -1
Explanation: The product of all values in the array is -1, and signFunc(-1) = -1
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function arraySign($nums) {
        $product = 1;
        
        foreach($nums as $num) {
            $product *= $num;
        }
        
        // echo $product . PHP_EOL;
        
        return $this->signFunc($product);
    }
    
    
    function signFunc($x) {
        if($x > 0) {
            return 1;
        } else if($x < 0) {
            return -1;
        } else {
            return 0;
        }
    }
}

$solution = new Solution();

// Output: 1
echo $solution->arraySign([-1,-2,-3,-4,3,2,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->arraySign([1,5,0,2,-3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -1
echo $solution->arraySign([-1,1,-1,1,-1]) . PHP_EOL;
echo '---' . PHP_EOL;