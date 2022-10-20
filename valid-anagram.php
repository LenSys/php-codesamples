<?php
/*
Valid Anagram

Given two strings s and t, return true if t is an anagram of s, and false otherwise.

An Anagram is a word or phrase formed by rearranging the letters of a different word 
or phrase, typically using all the original letters exactly once.

Input: s = "anagram", t = "nagaram"
Output: true

Input: s = "rat", t = "car"
Output: false
*/
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        if(strlen($s) !== strlen($t)) {
            return false;
        }
        
        $sCountArr = [];
        $tCountArr = [];
        $sCount = strlen($s);
        
        // calculate char frequencies
        for($i = 0; $i < $sCount; $i++) {
            $sChar = $s[$i];
            $tChar = $t[$i];
            
            $sCountArr[$sChar] = ($sCountArr[$sChar] ?? 0) + 1;
            $tCountArr[$tChar] = ($tCountArr[$tChar] ?? 0) + 1;
        }
        
        // iterate through all chars and frequencies
        foreach($sCountArr as $sChar => $sCharFrequency) {
            $tCharFrequency = ($tCountArr[$sChar] ?? 0);
        
            // check if both char frequencies match
            if($sCharFrequency !== $tCharFrequency) {
                return false;
            }
        }
    
        return true;
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->isAnagram("anagram", "nagaram"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->isAnagram("rat", "car"), true) . PHP_EOL;
echo '---' . PHP_EOL;