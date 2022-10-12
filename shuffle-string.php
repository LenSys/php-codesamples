<?php
/*
Shuffle String

You are given a string s and an integer array indices of the same length. The string s 
will be shuffled such that the character at the ith position moves to indices[i] in the 
shuffled string.

Return the shuffled string.

Input: s = "codeleet", indices = [4,5,6,7,0,2,1,3]
Output: "leetcode"
Explanation: As shown, "codeleet" becomes "leetcode" after shuffling.

Input: s = "abc", indices = [0,1,2]
Output: "abc"
Explanation: After shuffling, each character remains in its position.
*/
class Solution {

    /**
     * @param String $s
     * @param Integer[] $indices
     * @return String
     */
    function restoreString($s, $indices) {
        
        $shuffledArr = [];
        for($i = 0; $i < count($indices); $i++) {
            $index = $indices[$i];

            $shuffledArr[$index] = $s[$i];
        }
        ksort($shuffledArr);
        
        // echo var_export($shuffledArr, true);
        
        $shuffledString = '';
        for($i = 0; $i < count($shuffledArr); $i++) {
            $shuffledString .= $shuffledArr[$i];
        }
        
        return $shuffledString;
    }
}

$solution = new Solution();

// Output: "leetcode"
echo $solution->restoreString("codeleet", [4,5,6,7,0,2,1,3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "abc"
echo $solution->restoreString("abc", [0,1,2]) . PHP_EOL;
echo '---' . PHP_EOL;
