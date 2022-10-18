<?php
/*
Custom Sort String

You are given two strings order and s. All the characters of order are unique and 
were sorted in some custom order previously.

Permute the characters of s so that they match the order that order was sorted. 
More specifically, if a character x occurs before a character y in order, then x should occur before y in the permuted string.

Return any permutation of s that satisfies this property.

Input: order = "cba", s = "abcd"
Output: "cbad"
Explanation: 
             "a", "b", "c" appear in order, so the order of "a", "b", "c" should 
             be "c", "b", and "a". 
             Since "d" does not appear in order, it can be at any position in 
             the returned string. "dcba", "cdba", "cbda" are also valid outputs.

Input: order = "cbafg", s = "abcd"
Output: "cbad"
*/
class Solution {

    /**
     * @param String $order
     * @param String $s
     * @return String
     */
    function customSortString($order, $s) {
        
        // get order string
        $orderString = '';
        $orderLength = strlen($order);
        $str = $s;
        
        for($i = 0; $i < $orderLength; $i++) {
            $orderChar = $order[$i];
            
            // check if order char occours in string
            if(strstr($s, $orderChar)) {
                // count how often the char occours in string
                $charCount = substr_count($str, $orderChar);
                
                $orderString .= str_repeat($orderChar, $charCount);
                
                // remove ordered char from string
                $str = preg_replace('/' . $orderChar . '/', '', $str);
                
                // echo $orderChar . ' ' . $str . PHP_EOL;
            }
        }
        
        // we have all ordered chars, attach remaining string
        return $orderString . $str;
    }
}

$solution = new Solution();

// Output: "cbad"
echo $solution->customSortString("cba", "abcd") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "cbad"
echo $solution->customSortString("cbafg", "abcd") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "kqeep"
echo $solution->customSortString("kqep", "pekeq") . PHP_EOL;
echo '---' . PHP_EOL;
