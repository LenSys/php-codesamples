<?php
/*
Binary Number with Alternating Bits

Given a positive integer, check whether it has alternating bits: namely, if two
adjacent bits will always have different values.

Input: n = 5
Output: true
Explanation: The binary representation of 5 is: 101

Input: n = 7
Output: false
Explanation: The binary representation of 7 is: 111.
Example 3:

Input: n = 11
Output: false
Explanation: The binary representation of 11 is: 1011.
*/
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function hasAlternatingBits($n) {
        
        $hasAlternatingBits = true;
        $lastBit = !($n & 1);
        
        while($n > 0) {
            $bit = $n & 1;
            
            // echo (int)$bit .  PHP_EOL;
            
            if($bit === $lastBit) {
                $hasAlternatingBits = false;
                break;
            }
            
            $lastBit = $bit;
            
            $n = $n >> 1;
        }
        
        return $hasAlternatingBits;
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->hasAlternatingBits(5), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->hasAlternatingBits(7), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->hasAlternatingBits(11), true) . PHP_EOL;
echo '---' . PHP_EOL;