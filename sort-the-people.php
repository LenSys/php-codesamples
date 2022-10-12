<?php
/*
Sort the People

You are given an array of strings names, and an array heights that consists of 
distinct positive integers. Both arrays are of length n.

For each index i, names[i] and heights[i] denote the name and height of the ith person.
Return names sorted in descending order by the people's heights.

Input: names = ["Mary","John","Emma"], heights = [180,165,170]
Output: ["Mary","Emma","John"]
Explanation: Mary is the tallest, followed by Emma and John.

Input: names = ["Alice","Bob","Bob"], heights = [155,185,150]
Output: ["Bob","Alice","Bob"]
Explanation: The first Bob is the tallest, followed by Alice and the second Bob.
*/
class Solution {

    /**
     * @param String[] $names
     * @param Integer[] $heights
     * @return String[]
     */
    function sortPeople($names, $heights) {
        for($i = 0; $i < count($heights); $i++) {
            for($j = count($heights) - 2; $j >= 0; $j--) {
                
                if($heights[$j] < $heights[$j + 1]) {
                    // switch heights
                    $tempHeight = $heights[$j];
                    $heights[$j] = $heights[$j + 1];
                    $heights[$j + 1] = $tempHeight;
                    
                    $tempName = $names[$j];
                    $names[$j] = $names[$j + 1];;
                    $names[$j + 1] = $tempName;
                }
            }
        }
        
        return $names;
    }
}

$solution = new Solution();

// Output: ["Mary","Emma","John"]
echo var_export($solution->sortPeople(["Mary","John","Emma"], [180,165,170]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ["Bob","Alice","Bob"]
echo var_export($solution->sortPeople(["Alice","Bob","Bob"], [155,185,150]), true) . PHP_EOL;
echo '---' . PHP_EOL;