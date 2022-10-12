<?php
/*
Sorting the Sentence

A sentence is a list of words that are separated by a single space with no leading or 
trailing spaces. Each word consists of lowercase and uppercase English letters.

A sentence can be shuffled by appending the 1-indexed word position to each word then 
rearranging the words in the sentence.

For example, the sentence "This is a sentence" can be shuffled as "sentence4 a3 is2 This1" 
or "is2 sentence4 This1 a3".
Given a shuffled sentence s containing no more than 9 words, reconstruct and return the 
original sentence.

Input: s = "is2 sentence4 This1 a3"
Output: "This is a sentence"
Explanation: Sort the words in s to their original positions "This1 is2 a3 sentence4", 
             then remove the numbers.

Input: s = "Myself2 Me1 I4 and3"
Output: "Me Myself and I"
Explanation: Sort the words in s to their original positions "Me1 Myself2 and3 I4", 
             then remove the numbers.
*/
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function sortSentence($s) {
        $words = explode(' ', $s);
        $sortedWordArr = [];
        
        for($i = 0; $i < count($words); $i++) {
            $word = $words[$i];
            
            // get index from word (last char)
            $index = substr($word, strlen($word) - 1, strlen($word));
            
            // remove index from word (last char)
            $word = substr($word, 0, strlen($word) - 1);
            
            $sortedWordArr[$index] = $word;
            
            // echo $word . ' ' . $index . PHP_EOL;
        }
        ksort($sortedWordArr);
        
        $sortedSentence = '';
        foreach($sortedWordArr as $sortedWord) {
            $sortedSentence .= $sortedWord . ' ';
        }
        
        return trim($sortedSentence);
    }
}

$solution = new Solution();

// Output: "This is a sentence"
echo $solution->sortSentence("is2 sentence4 This1 a3") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "Me Myself and I"
echo $solution->sortSentence("Myself2 Me1 I4 and3") . PHP_EOL;
echo '---' . PHP_EOL;