<?php
/*
Distribute Candies

Alice has n candies, where the ith candy is of type candyType[i]. Alice noticed 
that she started to gain weight, so she visited a doctor.

The doctor advised Alice to only eat n / 2 of the candies she has (n is always even). 
Alice likes her candies very much, and she wants to eat the maximum number of 
different types of candies while still following the doctor's advice.

Given the integer array candyType of length n, return the maximum number of 
different types of candies she can eat if she only eats n / 2 of them.
*/
class Solution {

    /**
     * @param Integer[] $candyType
     * @return Integer
     */
    function distributeCandies($candyType) {
        
        $l = count($candyType);
        $maxCandies = $l / 2;
        $eatenCandiesArr = [];
        
        for($i = 0; $i < $l; $i++) {
            $candy = $candyType[$i];
            
            // check if alice still can eat candies
            if(count($eatenCandiesArr) < $maxCandies) {
                // check if alice has eaten this candy type
                if(!in_array($candy, $eatenCandiesArr)) {
                    array_push($eatenCandiesArr, $candy);
                }
            }
        }
        
        // echo var_export($eatenCandiesArr, true) . PHP_EOL;
        
        return count($eatenCandiesArr);
    }
}

$solution = new Solution();

// Output: 3
echo $solution->distributeCandies([1,1,2,2,3,3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->distributeCandies([1,1,2,3]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->distributeCandies([6,6,6,6]) . PHP_EOL;
echo '---' . PHP_EOL;
