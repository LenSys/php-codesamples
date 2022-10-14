<?php
/*
Maximum Score After Splitting a String

Given a string s of zeros and ones, return the maximum score after splitting the 
string into two non-empty substrings (i.e. left substring and right substring).

The score after splitting a string is the number of zeros in the left substring 
plus the number of ones in the right substring.

Input: s = "011101"
Output: 5 
Explanation: 
             All possible ways of splitting s into two non-empty substrings are:
             left = "0" and right = "11101", score = 1 + 4 = 5 
             left = "01" and right = "1101", score = 1 + 3 = 4 
             left = "011" and right = "101", score = 1 + 2 = 3 
             left = "0111" and right = "01", score = 1 + 1 = 2 
             left = "01110" and right = "1", score = 2 + 1 = 3

Input: s = "00111"
Output: 5
Explanation: When left = "00" and right = "111", we get the maximum score = 2 + 3 = 5

Input: s = "1111"
Output: 3
*/
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function maxScore($s) {
        
        $l = strlen($s);
        $maxScore = 0;
        for($i = 1; $i <= $l - 1; $i++) {
            
            $left = substr($s, 0, $i);
            $right = substr($s, $i, $l);
            
            $leftZerosSum = substr_count($left, '0');
            $rightOnesSum = substr_count($right, '1');
            $score = $leftZerosSum + $rightOnesSum;
            
            if($score > $maxScore) {
                $maxScore = $score;
            }
            
            echo $left . ' ' . $right . ' -> ' . $leftZerosSum . ' + ' . $rightOnesSum . ' = ' . $score . PHP_EOL;
            
        }
        
        echo '---' . PHP_EOL;
        
        return $maxScore;
    }
}

$solution = new Solution();

// Output: 5
echo $solution->maxScore("011101") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 5
echo $solution->maxScore("00111") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->maxScore("1111") . PHP_EOL;
echo '---' . PHP_EOL;