<?php
/*
Removing Stars From a String

You are given a string s, which contains stars *.

In one operation, you can:

    * Choose a star in s.
    * Remove the closest non-star character to its left, as well as remove the star 
      itself.
Return the string after all stars have been removed.

Note:
The input will be generated such that the operation is always possible.
It can be shown that the resulting string will always be unique.

Input: s = "leet**cod*e"
Output: "lecoe"
Explanation: Performing the removals from left to right:
             - The closest character to the 1st star is 't' in "leet**cod*e". s 
               becomes "lee*cod*e".
             - The closest character to the 2nd star is 'e' in "lee*cod*e". s 
               becomes "lecod*e".
             - The closest character to the 3rd star is 'd' in "lecod*e". s 
               becomes "lecoe".
             There are no more stars, so we return "lecoe".

Input: s = "erase*****"
Output: ""
Explanation: The entire string is removed, so we return an empty string.
*/
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function removeStars($s) {
        
        $sequence = $s;
        
        do {
            $starPos = strpos($sequence, '*');
            
            if($starPos !== false) {
                // update sequence
                $sequence = substr($sequence, 0, $starPos - 1) . substr($sequence, $starPos + 1, strlen($sequence));
            
                // echo var_export($sequence, true) . PHP_EOL;
            }
        } while($starPos !== false);
        
        return $sequence;
    }
}

$solution = new Solution();

// Output: "lecoe"
echo $solution->removeStars("leet**cod*e") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ""
echo $solution->removeStars("erase*****") . PHP_EOL;
echo '---' . PHP_EOL;