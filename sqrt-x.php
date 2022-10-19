<?php
/*
Sqrt(x)

Given a non-negative integer x, return the square root of x rounded down to the 
nearest integer. The returned integer should be non-negative as well.

You must not use any built-in exponent function or operator.

For example, do not use pow(x, 0.5) in c++ or x ** 0.5 in python.

Input: x = 4
Output: 2
Explanation: The square root of 4 is 2, so we return 2.

Input: x = 8
Output: 2
Explanation: The square root of 8 is 2.82842..., and since we round it down to the 
             nearest integer, 2 is returned.
*/
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        
        if($x === 1) {
            return 1;
        }
        
        for($i = 0; $i <= ($x / 2); $i++) {
            $powI = $i * $i;
            
            // echo $i . ' ' . $powI . PHP_EOL;
            
            if($x === $powI) {
                return $i;
            } else if($x < $powI) {
                return $i - 1;
            }
        }
        
        return ($i - 1);
    }
}

$solution = new Solution();

// Output: 2
echo $solution->mySqrt(4) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->mySqrt(8) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->mySqrt(1) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->mySqrt(2) . PHP_EOL;
echo '---' . PHP_EOL;