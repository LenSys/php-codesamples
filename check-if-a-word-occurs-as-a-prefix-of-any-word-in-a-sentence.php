<?php
/*
Check If a Word Occurs As a Prefix of Any Word in a Sentence

Given a sentence that consists of some words separated by a single space, and a 
searchWord, check if searchWord is a prefix of any word in sentence.

Return the index of the word in sentence (1-indexed) where searchWord is a prefix 
of this word. If searchWord is a prefix of more than one word, return the index 
of the first word (minimum index). If there is no such word return -1.

A prefix of a string s is any leading contiguous substring of s.

Input: sentence = "i love eating burger", searchWord = "burg"
Output: 4
Explanation: "burg" is prefix of "burger" which is the 4th word in the sentence.

Input: sentence = "this problem is an easy problem", searchWord = "pro"
Output: 2
Explanation: "pro" is prefix of "problem" which is the 2nd and the 6th word in the sentence, but we return 2 as it's the minimal index.

Input: sentence = "i am tired", searchWord = "you"
Output: -1
Explanation: "you" is not a prefix of any word in the sentence.
*/
class Solution {

    /**
     * @param String $sentence
     * @param String $searchWord
     * @return Integer
     */
    function isPrefixOfWord($sentence, $searchWord) {
        $words = explode(" ", $sentence);
        
        for($i = 0; $i < count($words); $i++) {
            $word = $words[$i];
            
            if(str_starts_with($word, $searchWord) === true) {
                return ($i + 1);
            }
        }
        
        return -1;
    }
}

$solution = new Solution();

// Output: 4
echo $solution->isPrefixOfWord("i love eating burger", "burg") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->isPrefixOfWord("this problem is an easy problem", "pro") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -1
echo $solution->isPrefixOfWord("i am tired", "you") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: -1
echo $solution->isPrefixOfWord("hellohello hellohellohello", "ell") . PHP_EOL;
echo '---' . PHP_EOL;