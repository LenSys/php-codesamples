<?php
/*
Number of Segments in a String

Given a string s, return the number of segments in the string.
A segment is defined to be a contiguous sequence of non-space characters.

Input: s = "Hello, my name is John"
Output: 5
Explanation: The five segments are ["Hello,", "my", "name", "is", "John"]

Input: s = "Hello"
Output: 1
*/
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countSegments($s) {
        $s = trim($s);
        
        if(strlen($s) === 0) {
            return 0;
        }
        
        $segments = explode(' ', $s);
        
        $segmentCount = 0;
        foreach($segments as $segment) {
            $segment = trim($segment);
            
            if(strlen($segment) > 0) {
                $segmentCount++;
            }
        }
        
        return $segmentCount;
    }
}

$solution = new Solution();

// Output: 5
echo $solution->countSegments("Hello, my name is John") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->countSegments("Hello") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countSegments("                ") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countSegments("") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 6
echo $solution->countSegments(", , , ,        a, eaefa") . PHP_EOL;
echo '---' . PHP_EOL;