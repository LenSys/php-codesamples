<?php
/*
Repeated Substring Pattern

Given a string s, check if it can be constructed by taking a substring of it and 
appending multiple copies of the substring together.

Input: s = "abab"
Output: true
Explanation: It is the substring "ab" twice.

Input: s = "aba"
Output: false

Input: s = "abcabcabcabc"
Output: true
Explanation: It is the substring "abc" four times or the substring "abcabc" twice.
*/
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function repeatedSubstringPattern($s) {
        
        $l = strlen($s);
        $middleLength = intval($l / 2);
        $startSplitIndex = 0;
        
        for($i = $middleLength; $i >= 1; $i--) {
            // get current substring (start with maximum length)
            $subStr = substr($s, 0, $i);
            // get remaining string
            $remainingStr = substr($s, $i, $l);
            // echo $subStr . ' ' . $remainingStr . PHP_EOL;

            // get necessary repeat times of substring to get remaining string length
            $repeatTimes = intval(strlen($remainingStr) / strlen($subStr));
            
            // repeat the substring multiple times
            $checkStr = str_repeat($subStr, $repeatTimes);
            
            // echo "\t" . $repeatTimes . ' ' . $checkStr . PHP_EOL;
               
            // check if both strings match
            if($checkStr === $remainingStr) {
                // we found the repeated substring pattern
                return true;
            }
        }
        
        return false;
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->repeatedSubstringPattern("abab"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->repeatedSubstringPattern("aba"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->repeatedSubstringPattern("abcabcabcabc"), true) . PHP_EOL;
echo '---' . PHP_EOL;
