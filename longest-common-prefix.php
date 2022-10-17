<?php
/*
Longest Common Prefix

Write a function to find the longest common prefix string amongst an array of strings.

If there is no common prefix, return an empty string "".

Input: strs = ["flower","flow","flight"]
Output: "fl"

Input: strs = ["dog","racecar","car"]
Output: ""
Explanation: There is no common prefix among the input strings.
*/
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        
        $firstStringLength = strlen($strs[0]);
        $substringStartsWithPrefix = true;
        $prefix = '';
        
        if(count($strs) === 1) {
            return $strs[0];
        }
        
        for($i = 0; $i <= $firstStringLength; $i++) {
        
            $prefix = substr($strs[0], 0, $i);
            
            // echo 'Prefix: ' . $prefix . PHP_EOL;
            
            for($j = 1; $j < count($strs); $j++) {
                
                // echo "\t" . $strs[$j] . ' ' . $prefix . PHP_EOL;
                
                if(!str_starts_with($strs[$j], $prefix)) {
                    $substringStartsWithPrefix = false;
                    $prefix = substr($prefix, 0, strlen($prefix) - 1);
                    break;
                }
            }
            
            if(!$substringStartsWithPrefix) {
                break;
            }
        }
        
        return $prefix;
    }
}

$solution = new Solution();

// Output: "fl"
echo $solution->longestCommonPrefix(["flower","flow","flight"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ""
echo $solution->longestCommonPrefix(["dog","racecar","car"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "a"
echo $solution->longestCommonPrefix(["a"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "flower"
echo $solution->longestCommonPrefix(["flower","flower","flower","flower"]) . PHP_EOL;
echo '---' . PHP_EOL;