<?php
/*
Goal Parser Interpretation

ou own a Goal Parser that can interpret a string command. The command consists of an 
alphabet of "G", "()" and/or "(al)" in some order. The Goal Parser will interpret "G" 
as the string "G", "()" as the string "o", and "(al)" as the string "al". 
The interpreted strings are then concatenated in the original order.

Given the string command, return the Goal Parser's interpretation of command.

Input: command = "G()(al)"
Output: "Goal"
Explanation: The Goal Parser interprets the command as follows:
             G -> G
             () -> o
             (al) -> al
             The final concatenated result is "Goal".

Input: command = "G()()()()(al)"
Output: "Gooooal"

Input: command = "(al)G(al)()()G"
Output: "alGalooG"
*/
class Solution {

    /**
     * @param String $command
     * @return String
     */
    function interpret($command) {
        $c = '';
        $i = 0;
        $output = '';

        do {
            $c .= $command[$i];
            // echo "c" . $c . PHP_EOL;

            if($c == 'G') {
                // found command G
                $output .= 'G';
                
                // reset current command
                $c = '';
            } else if($c == '()') {
                // found command ()
                $output .= 'o';
                
                // reset current command
                $c = '';
            } else if($c == '(al)') {
                // found command (al)
                $output .= 'al';
                
                // reset current command
                $c = '';
            }

            $i++;

        } while($i < strlen($command));

        return $output;
    }
}

$solution = new Solution();

// Output: "Goal"
echo $solution->interpret("G()(al)") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "Gooooal"
echo $solution->interpret("G()()()()(al)") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "alGalooG"
echo $solution->interpret("(al)G(al)()()G") . PHP_EOL;
echo '---' . PHP_EOL;