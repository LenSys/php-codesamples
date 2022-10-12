<?php
/*
Baseball Game

You are keeping the scores for a baseball game with strange rules. At the beginning 
of the game, you start with an empty record.

You are given a list of strings operations, where operations[i] is the ith operation 
you must apply to the record and is one of the following:

    * An integer x.
      Record a new score of x.

    * '+'.
      Record a new score that is the sum of the previous two scores.

    * 'D'.
      Record a new score that is the double of the previous score.

    * 'C'.
      Invalidate the previous score, removing it from the record.

Return the sum of all the scores on the record after applying all the operations.
The test cases are generated such that the answer and all intermediate calculations 
fit in a 32-bit integer and that all operations are valid.

Input: ops = ["5","2","C","D","+"]
Output: 30
Explanation:
             "5" - Add 5 to the record, record is now [5].
             "2" - Add 2 to the record, record is now [5, 2].
             "C" - Invalidate and remove the previous score, record is now [5].
             "D" - Add 2 * 5 = 10 to the record, record is now [5, 10].
             "+" - Add 5 + 10 = 15 to the record, record is now [5, 10, 15].
             The total sum is 5 + 10 + 15 = 30.

Input: ops = ["5","-2","4","C","D","9","+","+"]
Output: 27
Explanation:
             "5" - Add 5 to the record, record is now [5].
             "-2" - Add -2 to the record, record is now [5, -2].
             "4" - Add 4 to the record, record is now [5, -2, 4].
             "C" - Invalidate and remove the previous score, record is now [5, -2].
             "D" - Add 2 * -2 = -4 to the record, record is now [5, -2, -4].
             "9" - Add 9 to the record, record is now [5, -2, -4, 9].
             "+" - Add -4 + 9 = 5 to the record, record is now [5, -2, -4, 9, 5].
             "+" - Add 9 + 5 = 14 to the record, record is now [5, -2, -4, 9, 5, 14].
             The total sum is 5 + -2 + -4 + 9 + 5 + 14 = 27.

Input: ops = ["1","C"]
Output: 0
Explanation:
             "1" - Add 1 to the record, record is now [1].
             "C" - Invalidate and remove the previous score, record is now [].
             Since the record is empty, the total sum is 0.
*/
class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function calPoints($operations) {
        $pointsArr = [];
        
        foreach($operations as $operation) {
            $numScores = count($pointsArr);
            
            if(is_numeric($operation)) {
                array_push($pointsArr, $operation);
            } else if($operation === '+') {
                // sum of previous two scores
                $prevScore = $pointsArr[$numScores - 1];
                $prevPrevScore = $pointsArr[$numScores - 2];
                
                $newScore = $prevScore + $prevPrevScore;
                array_push($pointsArr, $newScore);
                
            } else if($operation === 'D') {
                // double of previous score
                $prevScore = $pointsArr[$numScores - 1];
                
                $newScore = 2 * $prevScore;
                array_push($pointsArr, $newScore);
            }  else if($operation === 'C') {
                // remove previous score
                array_pop($pointsArr);
            }
        }
        
        echo var_export($pointsArr, true) . PHP_EOL;
        
        return array_sum($pointsArr);
    }
}

$solution = new Solution();

// Output: 30
echo $solution->calPoints(["5","2","C","D","+"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 27
echo $solution->calPoints(["5","-2","4","C","D","9","+","+"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->calPoints(["1","C"]) . PHP_EOL;
echo '---' . PHP_EOL;
