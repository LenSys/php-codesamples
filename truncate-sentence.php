<?php
/*
Truncate Sentence

A sentence is a list of words that are separated by a single space with no leading 
or trailing spaces. Each of the words consists of only uppercase and lowercase 
English letters (no punctuation).

For example, "Hello World", "HELLO", and "hello world hello world" are all sentences.
You are given a sentence s​​​​​​ and an integer k​​​​​​. You want to truncate s​​​​​​ such that it 
contains only the first k​​​​​​ words. Return s​​​​​​ after truncating it.

Input: s = "Hello how are you Contestant", k = 4
Output: "Hello how are you"
Explanation:
             The words in s are ["Hello", "how" "are", "you", "Contestant"].
             The first 4 words are ["Hello", "how", "are", "you"].
             Hence, you should return "Hello how are you".

Input: s = "What is the solution to this problem", k = 4
Output: "What is the solution"
Explanation:
             The words in s are ["What", "is" "the", "solution", "to", "this", 
             "problem"].
             The first 4 words are ["What", "is", "the", "solution"].
             Hence, you should return "What is the solution".

Input: s = "chopper is not a tanuki", k = 5
Output: "chopper is not a tanuki"
*/
class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function truncateSentence($s, $k) {
        $wordsArr = explode(" ", $s);
        
        $outputWordsArr = [];
        for($i = 0; $i < $k; $i++) {
            $outputWordsArr[] = $wordsArr[$i];
        }
        
        return implode(" ", $outputWordsArr);
    }
}

$solution = new Solution();

// Output: "Hello how are you"
echo $solution->truncateSentence("Hello how are you Contestant", 4) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "What is the solution"
echo $solution->truncateSentence("What is the solution to this problem", 4) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "chopper is not a tanuki"
echo $solution->truncateSentence("chopper is not a tanuki", 5) . PHP_EOL;
echo '---' . PHP_EOL;