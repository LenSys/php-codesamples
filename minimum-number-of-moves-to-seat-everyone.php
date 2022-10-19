<?php
/*
Minimum Number of Moves to Seat Everyone

There are n seats and n students in a room. You are given an array seats of length n, 
where seats[i] is the position of the ith seat. You are also given the array students 
of length n, where students[j] is the position of the jth student.

You may perform the following move any number of times:

Increase or decrease the position of the ith student by 1 (i.e., moving the ith 
student from position x to x + 1 or x - 1)
Return the minimum number of moves required to move each student to a seat such that 
no two students are in the same seat.

Note that there may be multiple seats or students in the same position at the beginning.

Input: seats = [3,1,5], students = [2,7,4]
Output: 4
Explanation: The students are moved as follows:
             - The first student is moved from from position 2 to position 1 using 1 
               move.
             - The second student is moved from from position 7 to position 5 using 2 
               moves.
             - The third student is moved from from position 4 to position 3 using 1
               move.
             In total, 1 + 2 + 1 = 4 moves were used.

Input: seats = [4,1,5,9], students = [1,3,2,6]
Output: 7
Explanation: The students are moved as follows:
             - The first student is not moved.
             - The second student is moved from from position 3 to position 4 using 1 
               move.
             - The third student is moved from from position 2 to position 5 using 3 
               moves.
             - The fourth student is moved from from position 6 to position 9 using 3 
               moves.
             In total, 0 + 1 + 3 + 3 = 7 moves were used.

Input: seats = [2,2,6,6], students = [1,3,2,6]
Output: 4
Explanation: Note that there are two seats at position 2 and two seats at position 6.
             The students are moved as follows:
             - The first student is moved from from position 1 to position 2 using 1 move.
             - The second student is moved from from position 3 to position 6 using 3 moves.
             - The third student is not moved.
             - The fourth student is not moved.
             In total, 1 + 3 + 0 + 0 = 4 moves were used.
*/
class Solution {

    /**
     * @param Integer[] $seats
     * @param Integer[] $students
     * @return Integer
     */
    function minMovesToSeat($seats, $students) {
        rsort($seats);
        rsort($students);
        
        // echo var_export($seats, true) . PHP_EOL;
        // echo var_export($students, true) . PHP_EOL;
        
        $movesCount = 0;
        foreach($students as $studentPosition) {
            
            // find max seat position (first one is always max seat position!)
            $seatPosition = $seats[0];
            
            // remove used seat position
            unset($seats[0]);
            
            // fix order of keys (0-based index)
            $seats = array_values($seats);
            
            // echo $studentPosition . ' ' . $seatPosition . PHP_EOL;
            
            $movesCount += abs($studentPosition - $seatPosition);
        }
        
        return $movesCount;
    }
}

$solution = new Solution();

// Output: 4
echo $solution->minMovesToSeat([3,1,5], [2,7,4]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 7
echo $solution->minMovesToSeat([4,1,5,9], [1,3,2,6]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 4
echo $solution->minMovesToSeat([2,2,6,6], [1,3,2,6]) . PHP_EOL;
echo '---' . PHP_EOL;