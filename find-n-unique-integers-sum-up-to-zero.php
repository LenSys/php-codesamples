<?php
/*
Find N Unique Integers Sum up to Zero

Given an integer n, return any array containing n unique integers such that they 
add up to 0.

Input: n = 5
Output: [-7,-1,1,3,4]
Explanation: These arrays also are accepted [-5,-1,1,2,3] , [-3,-1,2,-2,4].

Input: n = 3
Output: [-1,0,1]

Input: n = 1
Output: [0]
*/
class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n) {
        
        $zeroSumArr = [];
        for($i = 1; $i <= $n; $i++) {
            
            if($i < $n) {
                do {
                    $remainingNum = rand(-1000, 1000);
                } while(in_array($remainingNum, $zeroSumArr) === true);
            } else {
                // last value, use sum difference
                $remainingNum = array_sum($zeroSumArr) * (-1);
            }
            
            
            array_push($zeroSumArr, $remainingNum);
        }
        
        return $zeroSumArr;
    }
}

$solution = new Solution();

// Output: e.g. [299, 907, -602, 34, -638]
echo var_export($solution->sumZero(5), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: e.g. [216, 985, -1201]
echo var_export($solution->sumZero(3), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [0]
echo var_export($solution->sumZero(1), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ...
echo var_export($solution->sumZero(185), true) . PHP_EOL;
echo '---' . PHP_EOL;