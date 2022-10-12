<?php
/*
Decode XORed Array

There is a hidden integer array arr that consists of n non-negative integers.

It was encoded into another integer array encoded of length n - 1, such that 
encoded[i] = arr[i] XOR arr[i + 1]. For example, if arr = [1,0,2,1], then 
encoded = [1,2,3].

You are given the encoded array. You are also given an integer first, that is the 
first element of arr, i.e. arr[0].

Return the original array arr. It can be proved that the answer exists and is unique.

Input: encoded = [1,2,3], first = 1
Output: [1,0,2,1]
Explanation: If arr = [1,0,2,1], then first = 1 and 
             encoded = [1 XOR 0, 0 XOR 2, 2 XOR 1] = [1,2,3]

Input: encoded = [6,2,7,3], first = 4
Output: [4,2,0,7,4]
*/

class Solution {

    /**
     * @param Integer[] $encoded
     * @param Integer $first
     * @return Integer[]
     */
    function decode($encoded, $first) {
        
        $decodedArr = [$first];
        for($i = 0; $i < count($encoded); $i++) {
            $currentValue = $decodedArr[$i];
            $encodedValue = $encoded[$i];
            
            // perform xor operation
            $decodedValue = $currentValue ^ $encodedValue;
            
            // echo $currentValue . ' ' . $encodedValue . ' ' . $decodedValue . PHP_EOL;
            $decodedArr[] = $decodedValue;
        }
        
        return $decodedArr;
    }
}

$solution = new Solution();

// Output: [1,0,2,1]
echo var_export($solution->decode([1,2,3], 1), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [4,2,0,7,4]
echo var_export($solution->decode([6,2,7,3], 4), true) . PHP_EOL;
echo '---' . PHP_EOL;