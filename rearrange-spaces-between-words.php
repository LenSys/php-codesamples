<?php
/*
Rearrange Spaces Between Words

You are given a string text of words that are placed among some number of spaces. 
Each word consists of one or more lowercase English letters and are separated by at 
least one space. It's guaranteed that text contains at least one word.

Rearrange the spaces so that there is an equal number of spaces between every pair 
of adjacent words and that number is maximized. If you cannot redistribute all the 
spaces equally, place the extra spaces at the end, meaning the returned string 
should be the same length as text.

Return the string after rearranging the spaces.

Input: text = "  this   is  a sentence "
Output: "this   is   a   sentence"
Explanation: There are a total of 9 spaces and 4 words. We can evenly divide the 9 
spaces between the words: 9 / (4-1) = 3 spaces.

Input: text = " practice   makes   perfect"
Output: "practice   makes   perfect "
Explanation: There are a total of 7 spaces and 3 words. 7 / (3-1) = 3 spaces plus 
1 extra space. We place this extra space at the end of the string.
*/
class Solution {

    /**
     * @param String $text
     * @return String
     */
    function reorderSpaces($text) {
        // count spaces
        $countSpaces = substr_count($text, ' ');
        
        // replace multiple spaces with single spaces
        $text = preg_replace('!\s+!', ' ', $text);
        
        $text = trim($text);
        
        // split sentence into words
        $words = explode(' ', $text);
        
        // echo $countSpaces . $text . PHP_EOL;
        // echo var_export($words, true) . PHP_EOL;
        
        // calculate space distribution
        if(count($words) > 1) {
            $spacesPerWord = intval($countSpaces / (count($words) - 1));
        } else {
            $spacesPerWord = 0;
        }
        $remainingSpaces = intval($countSpaces - ((count($words) - 1) * ($spacesPerWord)));
        
        // echo $spacesPerWord . ' ' . $remainingSpaces . PHP_EOL;
        
        $redistributedSentence = '';
        $wordCount = 0;
        foreach($words as $word) {
            
            $redistributedSentence .= $word;
            if($wordCount < (count($words) - 1)) {
                 $redistributedSentence .= str_repeat(' ', $spacesPerWord);
            }
            
            $wordCount++;
        }
        
        $redistributedSentence .= str_repeat(' ', $remainingSpaces);
        
        return $redistributedSentence;
    }
}

$solution = new Solution();

// Output: "this   is   a   sentence"
echo '"' . $solution->reorderSpaces("  this   is  a sentence ") . '"' . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "practice   makes   perfect "
echo '"' . $solution->reorderSpaces(" practice   makes   perfect") . '"' . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "a"
echo '"' . $solution->reorderSpaces("a") . '"' . PHP_EOL;
echo '---' . PHP_EOL;