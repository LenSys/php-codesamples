<?php
/*
Thousand Separator

Given an integer n, add a dot (".") as the thousands separator and return it in 
string format.

Input: n = 987
Output: "987"
Example 2:

Input: n = 1234
Output: "1.234"
*/
class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function thousandSeparator($n) {
        // one way
        // return number_format($n, 0, ',', '.');
        
        // another way
        $output = '';
        $numString = strrev($n);
        $thousandLength = 3;
        for($i = 0; $i < strlen($numString); $i+= $thousandLength) {
            $subString = substr($numString, $i, $thousandLength);
            $remainingString = substr($numString, $i + $thousandLength, strlen($numString));
            
            $output .= $subString;
            
            // echo $remainingString . ' ' . strlen($remainingString) . PHP_EOL;
            
            if(strlen($remainingString) > 0) {
                $output .= '.';
            }
        }
        
        $output = strrev($output);
        
        return $output;
    }
}


$solution = new Solution();

// Output: "987"
echo $solution->thousandSeparator(987) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "1.234"
echo $solution->thousandSeparator(1234) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "1.000.013"
echo $solution->thousandSeparator(1000013) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "987.654.321"
echo $solution->thousandSeparator(987654321) . PHP_EOL;
echo '---' . PHP_EOL;