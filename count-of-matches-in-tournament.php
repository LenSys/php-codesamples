<?php
/*
Count of Matches in Tournament

You are given an integer n, the number of teams in a tournament that has strange 
rules:

If the current number of teams is even, each team gets paired with another team. 
A total of n / 2 matches are played, and n / 2 teams advance to the next round.
If the current number of teams is odd, one team randomly advances in the tournament, 
and the rest gets paired. A total of (n - 1) / 2 matches are played, and 
(n - 1) / 2 + 1 teams advance to the next round.
Return the number of matches played in the tournament until a winner is decided.

Input: n = 7
Output: 6
Explanation: Details of the tournament: 
             - 1st Round: Teams = 7, Matches = 3, and 4 teams advance.
             - 2nd Round: Teams = 4, Matches = 2, and 2 teams advance.
             - 3rd Round: Teams = 2, Matches = 1, and 1 team is declared the winner.
             Total number of matches = 3 + 2 + 1 = 6.

Input: n = 14
Output: 13
Explanation: Details of the tournament:
             - 1st Round: Teams = 14, Matches = 7, and 7 teams advance.
             - 2nd Round: Teams = 7, Matches = 3, and 4 teams advance.
             - 3rd Round: Teams = 4, Matches = 2, and 2 teams advance.
             - 4th Round: Teams = 2, Matches = 1, and 1 team is declared the winner.
             Total number of matches = 7 + 3 + 2 + 1 = 13.
*/
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOfMatches($n) {
        $matchesCount = 0;
        $teams = $n;

        do {

            if(($teams % 2) == 0) {
                // even
                $matchesCount += $teams / 2;
                $teams = $teams / 2;
            } else {
                // odd
                $matchesCount += ($teams - 1) / 2;
                $teams = ($teams - 1) / 2 + 1;
            }

        } while($teams > 1);

        return $matchesCount;
    }
}

$solution = new Solution();

// Output: 6
echo $solution->numberOfMatches(7) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 13
echo $solution->numberOfMatches(14) . PHP_EOL;
echo '---' . PHP_EOL;