<?php
/*
Range Sum Query - Immutable

Given an integer array nums, handle multiple queries of the following type:

Calculate the sum of the elements of nums between indices left and right inclusive 
where left <= right.

Implement the NumArray class:
NumArray(int[] nums) Initializes the object with the integer array nums.
int sumRange(int left, int right) Returns the sum of the elements of nums between 
indices left and right inclusive (i.e. nums[left] + nums[left + 1] + ... + nums[right]).
 
Input
["NumArray", "sumRange", "sumRange", "sumRange"]
[[[-2, 0, 3, -5, 2, -1]], [0, 2], [2, 5], [0, 5]]
Output
[null, 1, -1, -3]

Explanation:
            NumArray numArray = new NumArray([-2, 0, 3, -5, 2, -1]);
            numArray.sumRange(0, 2); // return (-2) + 0 + 3 = 1
            numArray.sumRange(2, 5); // return 3 + (-5) + 2 + (-1) = -1
            numArray.sumRange(0, 5); // return (-2) + 0 + 3 + (-5) + 2 + (-1) = -3
*/
class NumArray {
    private $nums;
    
    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $this->nums = $nums;
    }
  
    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function sumRange($left, $right) {
        
        $sum = 0;
        for($i = $left; $i <= $right; $i++) {
            $sum += $this->nums[$i];
        }
        
        return $sum;
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = NumArray($nums);
 * $ret_1 = $obj->sumRange($left, $right);
 */

$nums = [-2, 0, 3, -5, 2, -1];
$numArrayObj = new NumArray($nums);

// Output: 1
echo var_export($numArrayObj->sumRange(0, 2), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -1
echo var_export($numArrayObj->sumRange(2, 5), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -3
echo var_export($numArrayObj->sumRange(0, 5), true) . PHP_EOL;
echo '---' . PHP_EOL;