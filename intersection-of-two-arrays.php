<?php
/*
Intersection of Two Arrays

Given two integer arrays nums1 and nums2, return an array of their intersection. 
Each element in the result must be unique and you may return the result in any order.

Input: nums1 = [1,2,2,1], nums2 = [2,2]
Output: [2]

Input: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
Output: [9,4]
Explanation: [4,9] is also accepted.
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        
        $l = count($nums1);
        $uniqueNumsArr = [];
        
        for($i = 0; $i < $l; $i++) {
            $num1 = $nums1[$i];
            $num2Pos = array_search($num1, $nums2);
            
            if($num2Pos !== false) {
                // num1 is in nums2
                
                // check if we have num1 already in the unique nums array
                if(!in_array($num1, $uniqueNumsArr)) {
                    // add to unique nums array
                    array_push($uniqueNumsArr, $num1);
                }
                
                // remove num1 element from nums2 array
                unset($nums2[$num2Pos]);
            }
        }
        
        return $uniqueNumsArr;
    }
}

$solution = new Solution();

// Output: [2]
echo var_export($solution->intersection([1,2,2,1], [2,2]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [4,9]
echo var_export($solution->intersection([4,9,5], [9,4,9,8,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;