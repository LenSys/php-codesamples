<?php
/*
Plus One

You are given a large integer represented as an integer array digits, where each 
digits[i] is the ith digit of the integer. The digits are ordered from most significant 
to least significant in left-to-right order. The large integer does not contain any 
leading 0's.

Increment the large integer by one and return the resulting array of digits.

Input: digits = [1,2,3]
Output: [1,2,4]
Explanation: The array represents the integer 123.
             Incrementing by one gives 123 + 1 = 124.
             Thus, the result should be [1,2,4].

Input: digits = [4,3,2,1]
Output: [4,3,2,2]
Explanation: The array represents the integer 4321.
             Incrementing by one gives 4321 + 1 = 4322.
             Thus, the result should be [4,3,2,2].

Input: digits = [9]
Output: [1,0]
Explanation: The array represents the integer 9.
             Incrementing by one gives 9 + 1 = 10.
             Thus, the result should be [1,0].
*/
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        
        $carry = 0;
        $resultArr = [];
        
        for($i = count($digits) - 1; $i >= 0; $i--) {
            $digit = intval($digits[$i]);
            
            // echo $i . ' ' . $digit . PHP_EOL;
            
            // check if current digit is right-most digit
            if($i === count($digits) - 1) {
                // add one to right-most digit
                $digit += 1;
            } else {
                // all other digits except right-most digit
                $digit += $carry;
            }
            
            if($digit > 9) {
                $digit = $digit - 10;
                $carry = 1;
            } else {
                $carry = 0;
            }
            
            $resultArr[] = $digit;
            
            // echo $i . ' x ' . var_export($resultArr, true) . PHP_EOL;
        }
        
        if($carry === 1) {
            echo "carry ";
            $resultArr[] = 1;
        }
        
        $resultArr = array_reverse($resultArr);
        
        // echo var_export($resultArr, true) . PHP_EOL;
        
        return $resultArr;
    }
}


$solution = new Solution();

// Output: [1,2,4]
echo var_export($solution->plusOne([1,2,3]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [4,3,2,2]
echo var_export($solution->plusOne([4,3,2,1]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,0]
echo var_export($solution->plusOne([9]), true) . PHP_EOL;
echo '---' . PHP_EOL;