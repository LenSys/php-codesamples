<?php
/*
Last Stone Weight

You are given an array of integers stones where stones[i] is the weight of the ith 
stone.

We are playing a game with the stones. On each turn, we choose the heaviest two 
stones and smash them together. Suppose the heaviest two stones have weights x and y 
with x <= y. The result of this smash is:

    * If x == y, both stones are destroyed, and
    * If x != y, the stone of weight x is destroyed, and the stone of weight y has 
      new weight y - x.

At the end of the game, there is at most one stone left.
Return the weight of the last remaining stone. 
If there are no stones left, return 0.

Input: stones = [2,7,4,1,8,1]
Output: 1
Explanation: 
             We combine 7 and 8 to get 1 so the array converts to [2,4,1,1,1] then,
             we combine 2 and 4 to get 2 so the array converts to [2,1,1,1] then,
             we combine 2 and 1 to get 1 so the array converts to [1,1,1] then,
             we combine 1 and 1 to get 0 so the array converts to [1] then that's 
             the value of the last stone.

Input: stones = [1]
Output: 1
*/
class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        while(count($stones) > 1) {
            $y = max($stones);
            $yIndex = array_search($y, $stones);
            unset($stones[$yIndex]);
        
            $x = max($stones);
            $xIndex = array_search($x, $stones);
            unset($stones[$xIndex]);
        
            // check if stones are equal
            if($x === $y) {
                // destroy both stones
            } else {
                $y = $y - $x;
                // add this stone to stones
                array_push($stones, $y);
            }
        
            // echo var_export($stones, true) . PHP_EOL;
        }
        
        $lastStoneWeight = 0;
        if(count($stones) > 0) {
            // fix index (0-based)
            $stones = array_values($stones);
            $lastStoneWeight = $stones[0];
        }
        
        return $lastStoneWeight;
    }
}

$solution = new Solution();

// Output: 1
echo $solution->lastStoneWeight([2,7,4,1,8,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->lastStoneWeight([1]) . PHP_EOL;
echo '---' . PHP_EOL;