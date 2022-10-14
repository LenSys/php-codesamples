<?php
/*
Sort Even and Odd Indices Independently

You are given a 0-indexed integer array nums. Rearrange the values of nums according 
to the following rules:

1. Sort the values at odd indices of nums in non-increasing order.
   For example, if nums = [4,1,2,3] before this step, it becomes [4,3,2,1] after. 
   The values at odd indices 1 and 3 are sorted in non-increasing order.

2. Sort the values at even indices of nums in non-decreasing order.
   For example, if nums = [4,1,2,3] before this step, it becomes [2,1,4,3] after. 
   The values at even indices 0 and 2 are sorted in non-decreasing order.

Return the array formed after rearranging the values of nums.

Input: nums = [4,1,2,3]
Output: [2,3,4,1]
Explanation: 
             First, we sort the values present at odd indices (1 and 3) in 
             non-increasing order.
             So, nums changes from [4,1,2,3] to [4,3,2,1].
             Next, we sort the values present at even indices (0 and 2) in 
             non-decreasing order.
             So, nums changes from [4,1,2,3] to [2,3,4,1].
             Thus, the array formed after rearranging the values is [2,3,4,1].

Input: nums = [2,1]
Output: [2,1]
Explanation: 
             Since there is exactly one odd index and one even index, no rearrangement 
             of values takes place.
             The resultant array formed is [2,1], which is the same as the initial 
             array. 

*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortEvenOdd($nums) {
        
        $oddNumbers = [];
        $evenNumbers = [];
        // iterate through nums
        foreach($nums as $index => $num) {
            // check if index is odd
            if(($index % 2) === 1) {
                // add odd number
                $oddNumbers[] = $num;
            } else {
                // add even number
                $evenNumbers[] = $num;
            }
        }
        
        // sort even numbers in descending order
        sort($evenNumbers);
        
        // sort even numbers in ascending order
        rsort($oddNumbers);
        
        echo '' . var_export($evenNumbers, true) . ' ' . PHP_EOL;
        echo '' . var_export($oddNumbers, true) . PHP_EOL;
        
        
        $sortedNums = [];
        $l = count($nums);
        for($i = 0; $i < $l; $i++) {
            if(isset($evenNumbers[$i])) {
                array_push($sortedNums, $evenNumbers[$i]);
            }
            
            if(isset($oddNumbers[$i])) {
                array_push($sortedNums, $oddNumbers[$i]);
            }
        }
        
        return $sortedNums;
    }
}

$solution = new Solution();

// Output: [2,3,4,1]
echo var_export($solution->sortEvenOdd([4,1,2,3]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [2,1]
echo var_export($solution->sortEvenOdd([2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [9,46,15,45,15,41,27,34,32,31,33,31,36,26,36,16,44,6]
echo var_export($solution->sortEvenOdd(
    [36,45,32,31,15,41,9,46,36,6,15,16,33,26,27,31,44,34]), true) . PHP_EOL;
echo '---' . PHP_EOL;
