<?php
/*
Decompress Run-Length Encoded List

We are given a list nums of integers representing a list compressed with run-length 
encoding.

Consider each adjacent pair of elements [freq, val] = [nums[2*i], nums[2*i+1]] 
(with i >= 0).  For each such pair, there are freq elements with value val concatenated 
in a sublist. Concatenate all the sublists from left to right to generate the 
decompressed list.

Return the decompressed list.

Input: nums = [1,2,3,4]
Output: [2,4,4,4]
Explanation: The first pair [1,2] means we have freq = 1 and val = 2 so we generate the 
array [2]. The second pair [3,4] means we have freq = 3 and val = 4 so we generate [4,4,4].
At the end the concatenation [2] + [4,4,4] is [2,4,4,4].

Input: nums = [1,1,2,3]
Output: [1,3,3]
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function decompressRLElist($nums) {
        $ansArr = [];
        for($i = 0; $i < count($nums) - 1; $i += 2) {
            $freq = $nums[$i];
            $val = $nums[$i + 1];
            $arr = [];

            for($j = 0; $j < $freq; $j++) {
                $arr[$j] = $val;
            }

            // combine arrays
            $ansArr = array_merge($ansArr, $arr);
        }

        return $ansArr;
    }
}

$solution = new Solution();

// Output: [2,4,4,4]
echo var_export($solution->decompressRLElist([1,2,3,4]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,3,3]
echo var_export($solution->decompressRLElist([1,1,2,3]), true) . PHP_EOL;
echo '---' . PHP_EOL;