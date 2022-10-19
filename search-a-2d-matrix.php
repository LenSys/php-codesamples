<?php
/*
Search a 2D Matrix

Write an efficient algorithm that searches for a value target in an m x n integer 
matrix matrix. This matrix has the following properties:

Integers in each row are sorted from left to right.
The first integer of each row is greater than the last integer of the previous row.

Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
Output: true

Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
Output: false
*/
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        $m = count($matrix);
        $row = $m  - 1;
        while($row >= 0) {
            // get first element of current row
            $matrixRow = $matrix[$row];
            $firstElement = $matrixRow[0];
            
            // check if first element is bigger than the smallest element of this row
            if($target >= $firstElement) {
                // we found the row to search 
                $targetMatrixIndex = array_search($target, $matrixRow);
                
                if($targetMatrixIndex !== false) {
                    return true;
                } else {
                    return false;
                }
            }
            
            $row--;
        }
        
        return false;
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->searchMatrix(
    [[1,3,5,7],[10,11,16,20],[23,30,34,60]], 3), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->searchMatrix(
    [[1,3,5,7],[10,11,16,20],[23,30,34,60]], 13), true) . PHP_EOL;
echo '---' . PHP_EOL;