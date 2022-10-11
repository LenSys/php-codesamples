<?php
/*
Maximum Number of Words Found in Sentences

A sentence is a list of words that are separated by a single space with no leading 
or trailing spaces.

You are given an array of strings sentences, where each sentences[i] represents a 
single sentence.

Return the maximum number of words that appear in a single sentence.
*/
class Solution {

    /**
     * @param String[] $sentences
     * @return Integer
     */
    function mostWordsFound($sentences) {
        $mostWords = 0;
        for($i = 0; $i < count($sentences); $i++) {
            $sentence = $sentences[$i];
            $words = explode(' ', $sentence);
            
            if(count($words) > $mostWords) {
                $mostWords = count($words);
            }
        }
        
        return $mostWords;
    }
}

$solution = new Solution();

// Output: 6
echo $solution->mostWordsFound(["alice and bob love leetcode", "i think so too", "this is great thanks very much"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->mostWordsFound(["please wait", "continue to fight", "continue to win"]) . PHP_EOL;
echo '---' . PHP_EOL;