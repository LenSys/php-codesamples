<?php
/*
Crawler Log Folder

The Leetcode file system keeps a log each time some user performs a change 
folder operation.

The operations are described below:

    * "../" : Move to the parent folder of the current folder. (If you are already 
      in the main folder, remain in the same folder).
    * "./" : Remain in the same folder.
    * "x/" : Move to the child folder named x (This folder is guaranteed to always 
      exist).

You are given a list of strings logs where logs[i] is the operation performed by 
the user at the ith step. The file system starts in the main folder, then the 
operations in logs are performed.

Return the minimum number of operations needed to go back to the main folder after 
the change folder operations.

Input: logs = ["d1/","d2/","../","d21/","./"]
Output: 2
Explanation: Use this change folder operation "../" 2 times and go back to the 
             main folder.

Input: logs = ["d1/","d2/","./","d3/","../","d31/"]
Output: 3

Input: logs = ["d1/","../","../","../"]
Output: 0
*/
class Solution {

    /**
     * @param String[] $logs
     * @return Integer
     */
    function minOperations($logs) {
        $hierarchyLevel = [];
        
        foreach($logs as $log) {
            // echo $log . PHP_EOL;
            
            if($log === '../') {
                // go to parent folder
                array_pop($hierarchyLevel);
            } else if($log === './') {
                // stay in current folder
            } else {
                // move to subdirectory
                array_push($hierarchyLevel, $log);
            }
        }
        
        // echo var_export($hierarchyLevel, true) . PHP_EOL;
        
        return count($hierarchyLevel);
    }
}

$solution = new Solution();

// Output: 2
echo $solution->minOperations(["d1/","d2/","../","d21/","./"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->minOperations(["d1/","d2/","./","d3/","../","d31/"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->minOperations(["d1/","../","../","../"]) . PHP_EOL;
echo '---' . PHP_EOL;