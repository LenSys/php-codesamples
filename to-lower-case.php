<?php
/*
To Lower Case

Given a string s, return the string after replacing every uppercase letter with the 
same lowercase letter.

Input: s = "Hello"
Output: "hello"

Input: s = "here"
Output: "here"

Input: s = "LOVELY"
Output: "lovely"
*/
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function toLowerCase($s) {
        $outputString = '';
        $upperCaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowerCaseChars = "abcdefghijklmnopqrstuvwxyz";
        
        for($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            $upperCaseCharPos = strpos($upperCaseChars, $char);
            if($upperCaseCharPos !== false) {
                $outputString .= $lowerCaseChars[$upperCaseCharPos];
            } else {
                $outputString .= $char;
            }
        }
        
        return $outputString;
    }
}

$solution = new Solution();

// Output: "hello"
echo $solution->toLowerCase("Hello") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "here"
echo $solution->toLowerCase("here") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "lovely"
echo $solution->toLowerCase("LOVELY") . PHP_EOL;
echo '---' . PHP_EOL;
