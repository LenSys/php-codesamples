<?php
/*
Number of Steps to Reduce a Number to Zero

Given an integer num, return the number of steps to reduce it to zero.

In one step, if the current number is even, you have to divide it by 2, otherwise, 
you have to subtract 1 from it.

Input: num = 14
Output: 6
Explanation: 
             Step 1) 14 is even; divide by 2 and obtain 7. 
             Step 2) 7 is odd; subtract 1 and obtain 6.
             Step 3) 6 is even; divide by 2 and obtain 3. 
             Step 4) 3 is odd; subtract 1 and obtain 2. 
             Step 5) 2 is even; divide by 2 and obtain 1. 
             Step 6) 1 is odd; subtract 1 and obtain 0.

Input: num = 8
Output: 4
Explanation: 
             Step 1) 8 is even; divide by 2 and obtain 4. 
             Step 2) 4 is even; divide by 2 and obtain 2. 
             Step 3) 2 is even; divide by 2 and obtain 1. 
             Step 4) 1 is odd; subtract 1 and obtain 0.
*/

class Solution {

    /**
     * @param Integer $num
     * @return Integer
     */
    function numberOfSteps($num) {
        $steps = 0;
        
        while($num > 0) {
            if(($num % 2) == 0) {
                $num = intval($num / 2);
            } else {
                $num = $num - 1;
            }
            
            $steps++;
        }
        
        return $steps;
    }
}

$solution = new Solution();

// Output: 6
echo $solution->numberOfSteps(14) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 4
echo $solution->numberOfSteps(8) . PHP_EOL;
echo '---' . PHP_EOL;