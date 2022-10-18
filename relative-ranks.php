<?php
/*
Relative Ranks

You are given an integer array score of size n, where score[i] is the score of the 
ith athlete in a competition. All the scores are guaranteed to be unique.

The athletes are placed based on their scores, where the 1st place athlete has the 
highest score, the 2nd place athlete has the 2nd highest score, and so on. 
The placement of each athlete determines their rank:

The 1st place athlete's rank is "Gold Medal".
The 2nd place athlete's rank is "Silver Medal".
The 3rd place athlete's rank is "Bronze Medal".
For the 4th place to the nth place athlete, their rank is their placement number 
(i.e., the xth place athlete's rank is "x").
Return an array answer of size n where answer[i] is the rank of the ith athlete.

Input: score = [5,4,3,2,1]
Output: ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
Explanation: The placements are [1st, 2nd, 3rd, 4th, 5th].

Input: score = [10,3,8,9,4]
Output: ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
Explanation: The placements are [1st, 5th, 3rd, 2nd, 4th].
*/
class Solution {

    /**
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks($score) {
        $rankNameArr = [
            1 => "Gold Medal",
            2 => "Silver Medal",
            3 => "Bronze Medal"
        ];
        
        $copyScore = $score;
        rsort($copyScore);
        
        // echo var_export($copyScore, true) . PHP_EOL;
        
        $ranksArr = [];
        
        foreach($score as $points) {
            $position = array_search($points, $copyScore);
            
            if($position !== false) {
                $rankName = $position + 1;
                
                if(isset($rankNameArr[$rankName])) {
                    $rankName = $rankNameArr[$rankName];
                }
                
                array_push($ranksArr, (string)$rankName);
            }
        }
        
        // echo var_export($ranksArr, true);
        
        return $ranksArr;
    }
}

$solution = new Solution();

// Output: ["Gold Medal","Silver Medal","Bronze Medal","4","5"]
echo var_export($solution->findRelativeRanks([5,4,3,2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ["Gold Medal","5","Bronze Medal","Silver Medal","4"]
echo var_export($solution->findRelativeRanks([10,3,8,9,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;