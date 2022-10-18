<?php
/*
Merge Sorted Array

You are given two integer arrays nums1 and nums2, sorted in non-decreasing order, 
and two integers m and n, representing the number of elements in nums1 and nums2 
respectively.

Merge nums1 and nums2 into a single array sorted in non-decreasing order.

The final sorted array should not be returned by the function, but instead be stored 
inside the array nums1. To accommodate this, nums1 has a length of m + n, where the 
first m elements denote the elements that should be merged, and the last n elements 
are set to 0 and should be ignored. nums2 has a length of n.

Input: nums1 = [1,2,3,0,0,0], m = 3, nums2 = [2,5,6], n = 3
Output: [1,2,2,3,5,6]
Explanation: The arrays we are merging are [1,2,3] and [2,5,6].
             The result of the merge is [1,2,2,3,5,6] with the underlined elements 
             coming from nums1.

Input: nums1 = [1], m = 1, nums2 = [], n = 0
Output: [1]
Explanation: The arrays we are merging are [1] and [].
             The result of the merge is [1].

Input: nums1 = [0], m = 0, nums2 = [1], n = 1
Output: [1]
Explanation: The arrays we are merging are [] and [1].
             The result of the merge is [1].

             Note that because m = 0, there are no elements in nums1. 
             The 0 is only there to ensure the merge result can fit in nums1.
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $l = count($nums1);
        
        for($i = 0; $i < $n; $i++) {
            $nums1[$m + $i] = $nums2[$i];
        }
        
        // sort nums1 array
        for($i = 0; $i < count($nums1); $i++) {
            for($j = count($nums1) - 2; $j >= 0; $j--) {
                if($nums1[$j] > $nums1[$j + 1]) {
                    // echo $nums[$j] . ' ' . $nums[$j + 1] . PHP_EOL;
                    
                    $tempNum = $nums1[$j];
                    $nums1[$j] = $nums1[$j + 1];
                    $nums1[$j + 1] = $tempNum;
                }
            }
        }
        
        // echo var_export($nums1, true) . PHP_EOL;
    }
}

$solution = new Solution();

// Output: [1,2,2,3,5,6]
$arr1 = [1,2,3,0,0,0];
$arr2 = [2,5,6];
$solution->merge($arr1, 3, $arr2, 3);
echo var_export($arr1, true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1]
$arr1 = [1];
$arr2 = [];
$solution->merge($arr1, 1, $arr2, 0);
echo var_export($arr1, true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1]
$arr1 = [0];
$arr2 = [1];
$solution->merge($arr1, 0, $arr2, 1);
echo var_export($arr1, true) . PHP_EOL;
echo '---' . PHP_EOL;
