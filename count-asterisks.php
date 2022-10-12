<?php
/*
Count Asterisks

You are given a string s, where every two consecutive vertical bars '|' are grouped into 
a pair. In other words, the 1st and 2nd '|' make a pair, the 3rd and 4th '|' make a pair, 
and so forth.

Return the number of '*' in s, excluding the '*' between each pair of '|'.
Note that each '|' will belong to exactly one pair.

Input: s = "l|*e*et|c**o|*de|"
Output: 2
Explanation: The considered characters are underlined: "l|*e*et|c**o|*de|".
             The characters between the first and second '|' are excluded from the answer.
             Also, the characters between the third and fourth '|' are excluded from the 
             answer. There are 2 asterisks considered. Therefore, we return 2.

Input: s = "iamprogrammer"
Output: 0
Explanation: In this example, there are no asterisks in s. Therefore, we return 0.

Input: s = "yo|uar|e**|b|e***au|tifu|l"
Output: 5
Explanation: The considered characters are underlined: "yo|uar|e**|b|e***au|tifu|l". 
             There are 5 asterisks considered. Therefore, we return 5.
*/
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countAsterisks($s) {
        $sequence = $s;
        $firstPointer = 0;
        $checkSequence = '';
        
        while($firstPointer !== false) {
            $firstPointer = strpos($sequence, '|');
            
            if($firstPointer !== false) {
                // get all chars until the first pointer ('|')
                $checkSequence .= substr($sequence, 0, $firstPointer);
                
                // update sequence to string after first pointer ('|')
                $sequence = substr($sequence, $firstPointer + 1);
                // get second pointer position of '|'
                $secondPointer = strpos($sequence, '|');
                
                // ignore everything between first pointer and second pointer of '|'
                $sequence = substr($sequence, $secondPointer + 1);
            } else {
                // append the remaining chars (because we have no '|' anymore)
                $checkSequence .= substr($sequence, 0, strlen($sequence));
            }
            
            // echo $firstPointer . ' ' . $sequence . ' -> ' . $checkSequence . PHP_EOL;
        }
        
        // count asterisk in check sequence
        return substr_count($checkSequence, '*');
    }
}

$solution = new Solution();

// Output: 2
echo $solution->countAsterisks("l|*e*et|c**o|*de|") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countAsterisks("iamprogrammer") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 5
echo $solution->countAsterisks("yo|uar|e**|b|e***au|tifu|l") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 8
echo $solution->countAsterisks("*||||**||*||**|**||*|||**") . PHP_EOL;
echo '---' . PHP_EOL;