<?php
/*
Backspace String Compare

Given two strings s and t, return true if they are equal when both are typed into 
empty text editors. '#' means a backspace character.

Note that after backspacing an empty text, the text will continue empty.

Input: s = "ab#c", t = "ad#c"
Output: true
Explanation: Both s and t become "ac".

Input: s = "ab##", t = "c#d#"
Output: true
Explanation: Both s and t become "".

Input: s = "a#c", t = "b"
Output: false
Explanation: s becomes "c" while t becomes "b".
*/
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function backspaceCompare($s, $t) {
        
        $firstWord = '';
        for($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            
            // check if char is backspace
            if($char === '#') {
                // remove last char from first word
                $firstWord = substr($firstWord, 0, strlen($firstWord) - 1);
            } else {
                $firstWord .= $char;
            }
        }
        
        $secondWord = '';
        for($i = 0; $i < strlen($t); $i++) {
            $char = $t[$i];
            
            // check if char is backspace
            if($char === '#') {
                // remove last char from second word
                $secondWord = substr($secondWord, 0, strlen($secondWord) - 1);
            } else {
                $secondWord .= $char;
            }
        }
        
        echo $firstWord . ' ' . $secondWord . PHP_EOL;
        
        return ($firstWord === $secondWord);
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->backspaceCompare("ab#c", "ad#c"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->backspaceCompare("ab##", "c#d#"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->backspaceCompare("a#c", "b"), true) . PHP_EOL;
echo '---' . PHP_EOL;