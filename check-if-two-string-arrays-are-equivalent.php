<?php
/*
Check If Two String Arrays are Equivalent

Given two string arrays word1 and word2, return true if the two arrays represent 
the same string, and false otherwise.

A string is represented by an array if the array elements concatenated in order 
forms the string.

Input: word1 = ["ab", "c"], word2 = ["a", "bc"]
Output: true
Explanation:
             word1 represents string "ab" + "c" -> "abc"
             word2 represents string "a" + "bc" -> "abc"
             The strings are the same, so return true.

Input: word1 = ["a", "cb"], word2 = ["ab", "c"]
Output: false

Input: word1  = ["abc", "d", "defg"], word2 = ["abcddefg"]
Output: true
*/
class Solution {

    /**
     * @param String[] $word1
     * @param String[] $word2
     * @return Boolean
     */
    function arrayStringsAreEqual($word1, $word2) {
        $str1 = implode('', $word1);
        $str2 = implode('', $word2);
        
        if($str1 === $str2) {
            return true;
        } else {
            return false;
        }
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->arrayStringsAreEqual(["ab", "c"], ["a", "bc"]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->arrayStringsAreEqual(["a", "cb"], ["ab", "c"]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->arrayStringsAreEqual(["abc", "d", "defg"], ["abcddefg"]), true) . PHP_EOL;
echo '---' . PHP_EOL;