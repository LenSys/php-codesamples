<?php
/*
Number of Students Unable to Eat Lunch

The school cafeteria offers circular and square sandwiches at lunch break, referred 
to by numbers 0 and 1 respectively. All students stand in a queue. Each student 
either prefers square or circular sandwiches.

The number of sandwiches in the cafeteria is equal to the number of students. 
The sandwiches are placed in a stack. At each step:

    * If the student at the front of the queue prefers the sandwich on the top of 
      the stack, they will take it and leave the queue.
    * Otherwise, they will leave it and go to the queue's end.

This continues until none of the queue students want to take the top sandwich and are 
thus unable to eat. You are given two integer arrays students and sandwiches where 
sandwiches[i] is the type of the i​​​​​​th sandwich in the stack (i = 0 is the top of the 
stack) and students[j] is the preference of the j​​​​​​th student in the initial queue 
(j = 0 is the front of the queue). 
Return the number of students that are unable to eat.

Input: students = [1,1,0,0], sandwiches = [0,1,0,1]
Output: 0 
Explanation:
             - Front student leaves the top sandwich and returns to the end of the 
               line making students = [1,0,0,1].
             - Front student leaves the top sandwich and returns to the end of the 
               line making students = [0,0,1,1].
             - Front student takes the top sandwich and leaves the line making 
               students = [0,1,1] and sandwiches = [1,0,1].
             - Front student leaves the top sandwich and returns to the end of the 
               line making students = [1,1,0].
             - Front student takes the top sandwich and leaves the line making 
               students = [1,0] and sandwiches = [0,1].
             - Front student leaves the top sandwich and returns to the end of the 
               line making students = [0,1].
             - Front student takes the top sandwich and leaves the line making 
               students = [1] and sandwiches = [1].
             - Front student takes the top sandwich and leaves the line making 
               students = [] and sandwiches = [].
             
             Hence all students are able to eat.

Input: students = [1,1,1,0,0,1], sandwiches = [1,0,0,0,1,1]
Output: 3
*/
class Solution {

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches) {
        
        $counter = 0;
        while((count($sandwiches) > 0) && ($counter < 1000)) {
            $student = array_shift($students);
            
            // echo $student . ' ' . $sandwiches[0] . PHP_EOL;
        
            if(($sandwiches[0] !== '') && ($sandwiches[0] === $student)) {
                // student can eat
                array_shift($sandwiches);
            } else {
                // student goes to the end of the line
                array_push($students, $student);
            }
            
            // echo var_export($students, true) . PHP_EOL;
            $counter++;
        }
        
        // all remaining students are unable to eat
        $studentsUnableToEat = count($students);
        
        return $studentsUnableToEat;
    }
}

$solution = new Solution();

// Output: 0
echo $solution->countStudents([1,1,0,0], [0,1,0,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->countStudents([1,1,1,0,0,1], [1,0,0,0,1,1]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countStudents(
    [0,1,0,0,0,0,0,1,1,0,0,0,1,1,0,1,1,0,0,1,1,1,0,1,0,0,0,0,1,1,1,1,1,0,1,1,1,1,1,0,1,0,0,0,1],
    [1,1,1,1,1,0,1,1,1,0,0,0,1,0,0,1,0,1,0,0,1,1,1,0,0,1,1,0,1,1,0,0,1,0,0,1,0,1,1,1,0,0,0,0,0]
) . PHP_EOL;
echo '---' . PHP_EOL;
