<?php
/*
Arranging Coins

You have n coins and you want to build a staircase with these coins. The staircase 
consists of k rows where the ith row has exactly i coins. The last row of the 
staircase may be incomplete.

Given the integer n, return the number of complete rows of the staircase you will 
build.

Input: n = 5
Output: 2
Explanation: Because the 3rd row is incomplete, we return 2.

Input: n = 8
Output: 3
Explanation: Because the 4th row is incomplete, we return 3.
*/

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function arrangeCoins($n) {
        $steps = 1;
        $remainingCoins = $n;
        $fullRows = 0;
        
        while($remainingCoins > 0) {
            $remainingCoins -= $steps;
            $steps++;
            
            if($remainingCoins >= 0) {
                $fullRows++;
            }
        }
        
        return $fullRows;
    }
}

$solution = new Solution();

// Output: 2
echo $solution->arrangeCoins(5) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->arrangeCoins(8) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->arrangeCoins(1) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->arrangeCoins(2) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->arrangeCoins(3) . PHP_EOL;
echo '---' . PHP_EOL;