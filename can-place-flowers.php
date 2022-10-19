<?php
/*
Can Place Flowers

You have a long flowerbed in which some of the plots are planted, and some are not. 
However, flowers cannot be planted in adjacent plots.

Given an integer array flowerbed containing 0's and 1's, where 0 means empty and 1 
means not empty, and an integer n, return if n new flowers can be planted in the 
flowerbed without violating the no-adjacent-flowers rule.

Input: flowerbed = [1,0,0,0,1], n = 1
Output: true

Input: flowerbed = [1,0,0,0,1], n = 2
Output: false
*/
class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        
        
        $plantedFlowersCount = 0;
        for($i = 0; $i < $n; $i++) {
            
            // search for first zero
            $firstZeroIndex = array_search(0, $flowerbed);
            
            if($firstZeroIndex !== false) {
                // check if next element after first zero is also zero
                if(isset($flowerbed[$firstZeroIndex + 1]) && ($flowerbed[$firstZeroIndex + 1] === 0)) {
                    // plant a flower (set to 1)
                    $flowerbed[$firstZeroIndex + 1] = 1;

                    // cut flowerbed at plant position 
                    // -> (necessary to be able to find first zero again)
                    $flowerbed = array_slice($flowerbed, $firstZeroIndex + 1);
            
                    $plantedFlowersCount++;
                }
            }
        }
        
        // echo var_export($flowerbed, true) . PHP_EOL;
        
        return ($plantedFlowersCount === $n);
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->canPlaceFlowers([1,0,0,0,1], 1), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->canPlaceFlowers([1,0,0,0,1], 2), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->canPlaceFlowers([1,0,0,0,0,0,1], 2), true) . PHP_EOL;
echo '---' . PHP_EOL;