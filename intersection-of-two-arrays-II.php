<?php
/*
Intersection of Two Arrays II

Given two integer arrays nums1 and nums2, return an array of their intersection. 
Each element in the result must appear as many times as it shows in both arrays and 
you may return the result in any order.

Input: nums1 = [1,2,2,1], nums2 = [2,2]
Output: [2,2]

Input: nums1 = [4,9,5], nums2 = [9,4,9,8,4]
Output: [4,9]
Explanation: [9,4] is also accepted.
*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $nums1Count = count($nums1);
        $intersectNumsArr = [];
        for($i = 0; $i < $nums1Count; $i++) {
            $num = $nums1[$i];
            
            if(count($nums2) > 0) {
                // check if current num is in num2
                $indexPosition = array_search($num, $nums2);
                if($indexPosition !== false) {
                    // remove current num at index in num2
                    unset($nums2[$indexPosition]);

                    // add num to intersect array
                    array_push($intersectNumsArr, $num);
                }
            } else {
                // no more num elements to search for
                break;
            }
            
            // echo var_export($nums2, true) . PHP_EOL;
        }
        
        return $intersectNumsArr;
    }
}

$solution = new Solution();

// Output: [2,2]
echo var_export($solution->intersect([1,2,2,1], [2,2]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [4, 9]
echo var_export($solution->intersect([4,9,5], [9,4,9,8,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [6]
echo var_export($solution->intersect([6,6,4,4,0,0,8,1,2], [6]), true) . PHP_EOL;
echo '---' . PHP_EOL;