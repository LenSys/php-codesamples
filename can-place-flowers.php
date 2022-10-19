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
        
        if($n === 0) {
            return true;
        }
        
        $plantedFlowersCount = 0;
        $l = count($flowerbed);
        for($i = 0; $i < $l; $i++) {
            
            $element = $flowerbed[$i];
            
            if($element === 1) {
                // we can not plant a flower on this element here
                // (-> a flower is already planted here)
                continue;
            }
            
            // get previous element in flowerbed
            $previousIndex = $i - 1;
            if($previousIndex >= 0) {
                $previousElement = $flowerbed[$previousIndex];
            } else {
                $previousElement = 0;
            }
            
            // get next element in flowerbed
            $nextIndex = $i + 1;
            if($nextIndex < $l) {
                $nextElement = $flowerbed[$nextIndex];
            } else {
                $nextElement = 0;
            }
            
            if(($previousElement === 0) && ($nextElement === 0)) {
                // we can plant because we have space before and after the current index
                $flowerbed[$i] = 1;
                
                $plantedFlowersCount++;
            }
            
            if($plantedFlowersCount === $n) {
                // we have planted all required flowers
                break;
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

// Output: false
echo var_export($solution->canPlaceFlowers([1,0,0,0,0,1], 2), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->canPlaceFlowers([0,0,1,0,1], 1), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->canPlaceFlowers([0,0,0,0,0,1,0,0], 0), true) . PHP_EOL;
echo '---' . PHP_EOL;
