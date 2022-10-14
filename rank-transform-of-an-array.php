<?php
/*
Rank Transform of an Array

Given an array of integers arr, replace each element with its rank.

The rank represents how large the element is. The rank has the following rules:

Rank is an integer starting from 1.
The larger the element, the larger the rank. If two elements are equal, their rank 
must be the same. Rank should be as small as possible.

Input: arr = [40,10,20,30]
Output: [4,1,2,3]
Explanation: 40 is the largest element. 
             10 is the smallest. 
             20 is the second smallest. 
             30 is the third smallest.

Input: arr = [100,100,100]
Output: [1,1,1]
Explanation: Same elements share the same rank.

Input: arr = [37,12,28,9,100,56,80,5,12]
Output: [5,3,4,2,8,6,7,1,3]
*/
class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr) {
        $rankArr = [];
        $arrCount = count($arr);
        
        // copy the array and sort ascending values
        $copyArr = $arr;
        asort($copyArr);
        
        $rank = 1;
        $sortedRankArr = [];
        $lastNum = false;
        foreach($copyArr as $num) {
            // ignore duplicates
            if($num === $lastNum) {
                continue;
            }
                
            $sortedRankArr[$num] = $rank;
            $lastNum = $num;
            
            // update rank
            $rank++;
        }
        
        // echo var_export($arr, true) . PHP_EOL;
        // echo var_export($copyArr, true) . PHP_EOL;
        // echo var_export($sortedRankArr, true) . PHP_EOL;
        
        for($i = 0; $i < $arrCount; $i++) {
            $num = $arr[$i];
            
            // find the num rank position in the sorted array
            $rank = $sortedRankArr[$num];
            
            array_push($rankArr, $rank);
        }
        
        return $rankArr;
    }
}

$solution = new Solution();

// Output: [4,1,2,3]
echo var_export($solution->arrayRankTransform([40,10,20,30]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,1,1]
echo var_export($solution->arrayRankTransform([100,100,100]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [5,3,4,2,8,6,7,1,3]
echo var_export($solution->arrayRankTransform([37,12,28,9,100,56,80,5,12]), true) . PHP_EOL;
echo '---' . PHP_EOL;