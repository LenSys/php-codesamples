<?php
/*
String Matching in an Array

Given an array of string words. Return all strings in words which is substring of 
another word in any order. 

String words[i] is substring of words[j], if can be obtained removing some characters 
to left and/or right side of words[j].

Input: words = ["mass","as","hero","superhero"]
Output: ["as","hero"]
Explanation: "as" is substring of "mass" and "hero" is substring of "superhero".
             ["hero","as"] is also a valid answer.

Input: words = ["leetcode","et","code"]
Output: ["et","code"]
Explanation: "et", "code" are substring of "leetcode".

Input: words = ["blue","green","bu"]
Output: []
*/

class Solution {

    /**
     * @param String[] $words
     * @return String[]
     */
    function stringMatching($words) {
        $wordsCount = count($words);
        $matchesArr = [];
        
        for($i = 0; $i < $wordsCount; $i++) {
            for($j = 0; $j < $wordsCount; $j++) {
                
                if($i === $j) {
                    continue;
                }
                
                $word_i = $words[$i];
                $word_j = $words[$j];
                
                if(strstr($word_i, $word_j) !== false) {
                    if(!in_array($word_j, $matchesArr)) {
                        $matchesArr[] = $word_j;
                    }
                }
                
                // echo $word_i . ' ' . $word_j . PHP_EOL;
            }
        }
        
        // echo "---" . PHP_EOL;
        
        return $matchesArr;
    }
}

$solution = new Solution();

// Output: ["as","hero"]
echo var_export($solution->stringMatching(["mass","as","hero","superhero"]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ["et","code"]
echo var_export($solution->stringMatching(["leetcode","et","code"]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: []
echo var_export($solution->stringMatching(["blue","green","bu"]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ["leetcode","od","am"]
echo var_export($solution->stringMatching(["leetcoder","leetcode","od","hamlet","am"]), true) . PHP_EOL;
echo '---' . PHP_EOL;
