<?php
/*
Jewels and Stones

You're given strings jewels representing the types of stones that are jewels, and 
stones representing the stones you have. Each character in stones is a type of stone 
you have. You want to know how many of the stones you have are also jewels.

Letters are case sensitive, so "a" is considered a different type of stone from "A".

Input: jewels = "aA", stones = "aAAbbbb"
Output: 3

Input: jewels = "z", stones = "ZZ"
Output: 0
*/

class Solution {

    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones) {
        
        $jewelsCount = 0;
        for($i = 0; $i < strlen($stones); $i++) {
            $stone = $stones[$i];
            
            if(strstr($jewels, $stone) !== false) {
                $jewelsCount++;
            }
        }
        
        return $jewelsCount;
    }
}

$solution = new Solution();

// Output: 3
echo $solution->numJewelsInStones("aA", "aAAbbbb") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->numJewelsInStones("z", "ZZ") . PHP_EOL;
echo '---' . PHP_EOL;
