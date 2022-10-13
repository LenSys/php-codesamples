<?php
/*
Unique Morse Code Words

International Morse Code defines a standard encoding where each letter is mapped 
to a series of dots and dashes, as follows:

'a' maps to ".-",
'b' maps to "-...",
'c' maps to "-.-.", and so on.
For convenience, the full table for the 26 letters of the English alphabet is 
given below:

[".-","-...","-.-.","-..",".","..-.","--.",
"....","..",".---","-.-",".-..","--","-.",
"---",".--.","--.-",".-.","...","-","..-",
"...-",".--","-..-","-.--","--.."]

Given an array of strings words where each word can be written as a concatenation 
of the Morse code of each letter.

For example, "cab" can be written as "-.-..--...", which is the concatenation of 
"-.-.", ".-", and "-...". We will call such a concatenation the transformation of 
a word. Return the number of different transformations among all words we have.

Input: words = ["gin","zen","gig","msg"]
Output: 2
Explanation: The transformation of each word is:
             "gin" -> "--...-."
             "zen" -> "--...-."
             "gig" -> "--...--."
             "msg" -> "--...--."
             There are 2 different transformations: "--...-." and "--...--.".

Input: words = ["a"]
Output: 1
*/
class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function uniqueMorseRepresentations($words) {
        $morseCodeLetters = [
            ".-","-...","-.-.","-..",".","..-.","--.",
            "....","..",".---","-.-",".-..","--","-.",
            "---",".--.","--.-",".-.","...","-","..-",
            "...-",".--","-..-","-.--","--.."
        ];
        
        $transformationsArr = [];
        $wordsCount = count($words);
        for($i = 0; $i < $wordsCount; $i++) {
            $word = $words[$i];
            $charCount = strlen($word);
            
            $transformation = "";
            for($j = 0; $j < $charCount; $j++) {
                $letter = $word[$j];
                $morseCodeLetterOffset = ord($letter) - ord('a');

                // echo $letter . ' -> ' . $morseCodeLetterOffset . ' ' . $morseCodeLetters[$morseCodeLetterOffset] . ' ' . PHP_EOL;
                
                $transformation .= $morseCodeLetters[$morseCodeLetterOffset];
            }
            
            $transformationsArr[] = $transformation;
            echo $word . ' -> ' . $transformation . PHP_EOL;
        }
        
        $uniqueTransformationsArr = array_unique($transformationsArr);
        
        echo '---' . PHP_EOL;
        echo var_export($uniqueTransformationsArr, true) . PHP_EOL;
        echo '---' . PHP_EOL;
        
        return count($uniqueTransformationsArr);
    }
}

$solution = new Solution();

// Output: 
echo $solution->uniqueMorseRepresentations(["gin","zen","gig","msg"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 
echo $solution->uniqueMorseRepresentations(["a"]) . PHP_EOL;
echo '---' . PHP_EOL;
