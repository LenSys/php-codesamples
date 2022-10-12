<?php
/*
Subtract the Product and Sum of Digits of an Integer

Given an integer number n, return the difference between the product of its digits and 
the sum of its digits.

Input: n = 234
Output: 15 
Explanation: 
             Product of digits = 2 * 3 * 4 = 24 
             Sum of digits = 2 + 3 + 4 = 9 
             Result = 24 - 9 = 15

Input: n = 4421
Output: 21
Explanation: 
             Product of digits = 4 * 4 * 2 * 1 = 32 
             Sum of digits = 4 + 4 + 2 + 1 = 11 
             Result = 32 - 11 = 21
*/
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function subtractProductAndSum($n) {
        
        $product = 1;
        $sum = 0;
        $digitRest = $n;
        for($i = strlen($n) - 1; $i >= 0; $i--) {
            $digit = intval($digitRest / pow(10, $i));
            $digitRest = $digitRest % pow(10, $i);
            
            // echo 'digit:' . $digit . ' rest:' . $digitRest . PHP_EOL;
            
            $product *= $digit;
            $sum += $digit;
        }
        
        $result = $product - $sum;
        
        return $result;
    }
}

$solution = new Solution();

// Output: 15
echo $solution->subtractProductAndSum(234) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 21
echo $solution->subtractProductAndSum(4421) . PHP_EOL;
echo '---' . PHP_EOL;
