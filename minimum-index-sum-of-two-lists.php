<?php
/*
Minimum Index Sum of Two Lists

Given two arrays of strings list1 and list2, find the common strings with the least 
index sum. A common string is a string that appeared in both list1 and list2.

A common string with the least index sum is a common string such that if it appeared 
at list1[i] and list2[j] then i + j should be the minimum value among all the other 
common strings.

Return all the common strings with the least index sum. Return the answer in any order.

Input: list1 = ["Shogun","Tapioca Express","Burger King","KFC"], 
       list2 = ["Piatti","The Grill at Torrey Pines","Hungry Hunter Steakhouse","Shogun"]
Output: ["Shogun"]
Explanation: The only common string is "Shogun".

Input: list1 = ["Shogun","Tapioca Express","Burger King","KFC"], 
       list2 = ["KFC","Shogun","Burger King"]
Output: ["Shogun"]
Explanation: The common string with the least index sum is "Shogun" with index 
             sum = (0 + 1) = 1.

Input: list1 = ["happy","sad","good"], list2 = ["sad","happy","good"]
Output: ["sad","happy"]
Explanation: There are three common strings:
             "happy" with index sum = (0 + 1) = 1.
             "sad" with index sum = (1 + 0) = 1.
             "good" with index sum = (2 + 2) = 4.
             The strings with the least index sum are "sad" and "happy".
*/
class Solution {

    /**
     * @param String[] $list1
     * @param String[] $list2
     * @return String[]
     */
    function findRestaurant($list1, $list2) {
        
        $i = 0;
        $elementsCountArr = [];
        $minIndexSum = PHP_INT_MAX;
        foreach($list1 as $listElement1) {
            
            $j = array_search($listElement1, $list2);
            
            if($j !== false) {
                // element is in both lists, calculate index sum
                $indexSum = $i + $j;
                $elementsCountArr[$listElement1] = $indexSum;
                
                if($indexSum < $minIndexSum) {
                    $minIndexSum = $indexSum;
                }
            }
            
            $i++;
        }
        
        // echo var_export($elementsCountArr, true) . PHP_EOL;
        
        // sort in ascending order to get minimum index sum
        asort($elementsCountArr);
        
        $commonStringArr = [];
        foreach($elementsCountArr as $commonString => $indexSum) {
            if($indexSum <= $minIndexSum) {
                array_push($commonStringArr, $commonString);
            }
        }
        
        return $commonStringArr;
    }
}

$solution = new Solution();

// Output: ["Shogun"]
echo var_export($solution->findRestaurant(
    ["Shogun","Tapioca Express","Burger King","KFC"],
    ["Piatti","The Grill at Torrey Pines","Hungry Hunter Steakhouse","Shogun"])
    , true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: ["Shogun"]
echo var_export($solution->findRestaurant(
    ["Shogun","Tapioca Express","Burger King","KFC"], 
    ["KFC","Shogun","Burger King"])
    , true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 
echo var_export($solution->findRestaurant(
    ["happy","sad","good"], 
    ["sad","happy","good"])
    , true) . PHP_EOL;
echo '---' . PHP_EOL;