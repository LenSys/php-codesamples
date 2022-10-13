<?php
/*
Kth Distinct String in an Array

A distinct string is a string that is present only once in an array.

Given an array of strings arr, and an integer k, return the kth distinct string 
present in arr. If there are fewer than k distinct strings, return an empty string "".

Note that the strings are considered in the order in which they appear in the array.

Input: arr = ["d","b","c","b","c","a"], k = 2
Output: "a"
Explanation:
             The only distinct strings in arr are "d" and "a".
             "d" appears 1st, so it is the 1st distinct string.
             "a" appears 2nd, so it is the 2nd distinct string.
             Since k == 2, "a" is returned. 

Input: arr = ["aaa","aa","a"], k = 1
Output: "aaa"
Explanation:
             All strings in arr are distinct, so the 1st string "aaa" is returned.

Input: arr = ["a","b","a"], k = 3
Output: ""
Explanation:
             The only distinct string is "b". Since there are fewer than 3 distinct 
             strings, we return an empty string "".
*/
class Solution {

    /**
     * @param String[] $arr
     * @param Integer $k
     * @return String
     */
    function kthDistinct($arr, $k) {
        $distinctStringArr = [];
        $arrCount = count($arr);
        
        $valuesCountArr = [];
        
        for($i = 0; $i < $arrCount; $i++) {
            $str = $arr[$i];
            
            // count string occourrence in array
            $valuesCountArr[$str] = (isset($valuesCountArr[$str])) ? $valuesCountArr[$str] + 1 : 1;
        }
        
        // sort by occourence (values) ascending
        asort($valuesCountArr);
        
        foreach($valuesCountArr as $str => $occourrenceCount) {
            if($occourrenceCount > 1) {
                break;
            }
            
            $distinctStringArr[] = $str;
        }
        
        echo var_export($distinctStringArr, true) . PHP_EOL;
        
        if(count($distinctStringArr) < $k) {
            return "";
        } else {
            return $distinctStringArr[$k - 1];
        }
    }
}

$solution = new Solution();

// Output: "a"
echo $solution->kthDistinct(["d","b","c","b","c","a"], 2) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "aaa"
echo $solution->kthDistinct(["aaa","aa","a"], 1) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ""
echo $solution->kthDistinct(["a","b","a"], 3) . PHP_EOL;
echo '---' . PHP_EOL;