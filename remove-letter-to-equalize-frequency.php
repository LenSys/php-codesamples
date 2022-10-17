<?php
/*
Remove Letter To Equalize Frequency

You are given a 0-indexed string word, consisting of lowercase English letters. 
You need to select one index and remove the letter at that index from word so that 
the frequency of every letter present in word is equal.

Return true if it is possible to remove one letter so that the frequency of all 
letters in word are equal, and false otherwise.

Note:

The frequency of a letter x is the number of times it occurs in the string.
You must remove exactly one letter and cannot chose to do nothing.

Input: word = "abcc"
Output: true
Explanation: Select index 3 and delete it: word becomes "abc" and each character has 
             a frequency of 1.

Input: word = "aazz"
Output: false
Explanation: We must delete a character, so either the frequency of "a" is 1 and the 
             frequency of "z" is 2, or vice versa. It is impossible to make all 
             present letters have equal frequency.
*/
class Solution {

    /**
     * @param String $word
     * @return Boolean
     */
    function equalFrequency($word) {
        $frequencyCountArr = [];
        $wordLength = strlen($word);
        
        for($i = 0; $i < $wordLength; $i++) {
            $char = $word[$i];
            
            $frequencyCountArr[$char] = ($frequencyCountArr[$char] ?? 0) + 1;
        }
        
        rsort($frequencyCountArr);
        
        // echo var_export($frequencyCountArr, true) . PHP_EOL;
        
        // highest frequncy count
        
        // lowest frequency count
        // -> edge case: we remove the lowest frequency char
        $highestFrequencyArr = $frequencyCountArr;
        $highestFrequencyArr[count($highestFrequencyArr) - 1]--;
        $canRemoveLetter = $this->isValidFrequency($highestFrequencyArr);
        
        if(!$canRemoveLetter) {
            // other case: reduce frequency of highest value by one
            $frequencyCountArr[0]--;
            $canRemoveLetter = $this->isValidFrequency($frequencyCountArr);
        }
        
        
        return $canRemoveLetter;
    }
    
    function isValidFrequency($frequencyCountArr) {
        $canRemoveLetter = true;
        // get highest remaining frequency
        $previousFrequency = max(1, $frequencyCountArr[0]);
        foreach($frequencyCountArr as $char => $frequency) {
            // ignore chars with frequency 0
            if($frequency === 0) {
                continue;
            }
            
            // check if reduced frequency is equal to all other frequencies
            if($frequency !== $previousFrequency) {
                $canRemoveLetter = false;
                break;
            }
        }
        
        return $canRemoveLetter;
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->equalFrequency("abcc"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->equalFrequency("aazz"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->equalFrequency("bac"), true) . PHP_EOL;
echo '---' . PHP_EOL;