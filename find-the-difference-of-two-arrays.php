<?php
/*
Find the Difference of Two Arrays

Given two 0-indexed integer arrays nums1 and nums2, return a list answer of size 
2 where:

answer[0] is a list of all distinct integers in nums1 which are not present in nums2.
answer[1] is a list of all distinct integers in nums2 which are not present in nums1.
Note that the integers in the lists may be returned in any order.

Input: nums1 = [1,2,3], nums2 = [2,4,6]
Output: [[1,3],[4,6]]
Explanation:
             For nums1, nums1[1] = 2 is present at index 0 of nums2, whereas 
             nums1[0] = 1 and 
             nums1[2] = 3 are not present in nums2. Therefore, answer[0] = [1,3].
             For nums2, nums2[0] = 2 is present at index 1 of nums1, whereas 
             nums2[1] = 4 and 
             nums2[2] = 6 are not present in nums2. Therefore, answer[1] = [4,6].

Input: nums1 = [1,2,3,3], nums2 = [1,1,2,2]
Output: [[3],[]]
Explanation:
For nums1, nums1[2] and nums1[3] are not present in nums2. 
Since nums1[2] == nums1[3], their value is only included once and answer[0] = [3].
Every integer in nums2 is present in nums1. Therefore, answer[1] = [].
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    function findDifference($nums1, $nums2) {
        $answer = [];
        $answer[0] = [];
        $answer[1] = [];
        $l = count($nums1);
        
        for($i = 0; $i < $l; $i++) {
            $num1 = $nums1[$i];
            
            if(!in_array($num1, $nums2)) {
                if(!in_array($num1, $answer[0])) {
                    $answer[0][] = $num1;
                }
            }
        }
        
        $l = count($nums2);
        
        for($i = 0; $i < $l; $i++) {
            $num2 = $nums2[$i];
            
            if(!in_array($num2, $nums1)) {
                if(!in_array($num2, $answer[1])) {
                    $answer[1][] = $num2;
                }
            }
        }
        
        return $answer;
    }
}

$solution = new Solution();

// Output: [[1,3],[4,6]]
echo var_export($solution->findDifference([1,2,3], [2,4,6]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [[3],[]]
echo var_export($solution->findDifference([1,2,3,3], [1,1,2,2]), true) . PHP_EOL;
echo '---' . PHP_EOL;