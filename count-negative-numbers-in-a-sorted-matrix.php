<?php
/*
Count Negative Numbers in a Sorted Matrix

Given a m x n matrix grid which is sorted in non-increasing order both row-wise 
and column-wise, return the number of negative numbers in grid.

Input: grid = [[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]]
Output: 8
Explanation: There are 8 negatives number in the matrix.

Input: grid = [[3,2],[1,0]]
Output: 0
*/
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countNegatives($grid) {
        $mCount = count($grid);
        $negativeElementsCount = 0;
        
        for($m = 0; $m < $mCount; $m++) {
            $nElements = $grid[$m];
            $nCount = count($nElements);
            
            for($n = 0; $n < $nCount; $n++) {
                $cellElement = $nElements[$n];
                
                if($cellElement < 0) {
                    $negativeElementsCount++;
                }
            }
        }
        
        return $negativeElementsCount;
    }
}

$solution = new Solution();

// Output: 8
echo $solution->countNegatives([[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countNegatives([[3,2],[1,0]]) . PHP_EOL;
echo '---' . PHP_EOL;