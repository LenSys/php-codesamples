<?php
/*
Smallest Even Multiple

Given a positive integer n, return the smallest positive integer that is a multiple 
of both 2 and n.

Input: n = 5
Output: 10
Explanation: The smallest multiple of both 5 and 2 is 10.

Input: n = 6
Output: 6
Explanation: The smallest multiple of both 6 and 2 is 6. Note that a number is a 
multiple of itself.
*/
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestEvenMultiple($n) {
        $multipleOf2AndN = 0;
        
        for($i = 2; $i <= (2 * $n); $i++) {
            $isMultipleOfTwo = (($i % 2) === 0);
            $isMultipleOfN = (($i % $n) === 0);
            
            if($isMultipleOfTwo && $isMultipleOfN) {
                $multipleOf2AndN = $i;
                break;
            }
        }
        
        return $multipleOf2AndN;
    }
}

$solution = new Solution();

// Output: 10
echo $solution->smallestEvenMultiple(5) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 6
echo $solution->smallestEvenMultiple(6) . PHP_EOL;
echo '---' . PHP_EOL;