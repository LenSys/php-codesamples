<?php
/*
Count the Number of Consistent Strings

You are given a string allowed consisting of distinct characters and an array of 
strings words. A string is consistent if all characters in the string appear in 
the string allowed.

Return the number of consistent strings in the array words.

Input: allowed = "ab", words = ["ad","bd","aaab","baa","badab"]
Output: 2
Explanation: Strings "aaab" and "baa" are consistent since they only contain 
             characters 'a' and 'b'.

Input: allowed = "abc", words = ["a","b","c","ab","ac","bc","abc"]
Output: 7
Explanation: All strings are consistent.

Input: allowed = "cad", words = ["cc","acd","b","ba","bac","bad","ac","d"]
Output: 4
Explanation: Strings "cc", "acd", "ac", and "d" are consistent.
*/
class Solution {

    /**
     * @param String $allowed
     * @param String[] $words
     * @return Integer
     */
    function countConsistentStrings($allowed, $words) {
        $wordsCount = count($words);
        $allowedWordsCount = 0;
        
        for($i = 0; $i < $wordsCount; $i++) {
            $word = $words[$i];
            $wordLength = strlen($word);
            
            $isAllowed = true;
            
            for($j = 0; $j < $wordLength; $j++) {
                $char = $word[$j];
                
                if(strstr($allowed, $char) === false) {
                    $isAllowed = false;
                }
            }
            
            if($isAllowed) {
                $allowedWordsCount++;
            }
        }
        
        return $allowedWordsCount;
    }
}

$solution = new Solution();

// Output: 2
echo $solution->countConsistentStrings("ab", ["ad","bd","aaab","baa","badab"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 7
echo $solution->countConsistentStrings("abc", ["a","b","c","ab","ac","bc","abc"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 4
echo $solution->countConsistentStrings("cad", ["cc","acd","b","ba","bac","bad","ac","d"]) . PHP_EOL;
echo '---' . PHP_EOL;