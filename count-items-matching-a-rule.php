<?php
/*
Count Items Matching a Rule

You are given an array items, where each items[i] = [typei, colori, namei] describes the
type, color, and name of the ith item. You are also given a rule represented by two 
strings, ruleKey and ruleValue.

The ith item is said to match the rule if one of the following is true:

ruleKey == "type" and ruleValue == typei.
ruleKey == "color" and ruleValue == colori.
ruleKey == "name" and ruleValue == namei.
Return the number of items that match the given rule.

Input: items = [["phone","blue","pixel"],
                ["computer","silver","lenovo"],
                ["phone","gold","iphone"]], 
                ruleKey = "color", 
                ruleValue = "silver"
Output: 1
Explanation: There is only one item matching the given rule, which is 
             ["computer","silver","lenovo"].

Input: items = [["phone","blue","pixel"],
                ["computer","silver","phone"],
                ["phone","gold","iphone"]], 
                ruleKey = "type", 
                ruleValue = "phone"
Output: 2
Explanation: There are only two items matching the given rule, which are 
             ["phone","blue","pixel"] and ["phone","gold","iphone"]. 
             Note that the item ["computer","silver","phone"] does not match.
*/
class Solution {

    /**
     * @param String[][] $items
     * @param String $ruleKey
     * @param String $ruleValue
     * @return Integer
     */
    function countMatches($items, $ruleKey, $ruleValue) {
        $itemMatchesCount = 0;
        
        for($i = 0; $i < count($items); $i++) {
            $item = $items[$i];
            
            $itemType = $item[0];
            $itemColor = $item[1];
            $itemName = $item[2];
            
            if(($ruleKey === "type") && ($ruleValue === $itemType)) {
                $itemMatchesCount++;
            } elseif(($ruleKey === "color") && ($ruleValue === $itemColor)) {
                $itemMatchesCount++;
            } elseif(($ruleKey === "name") && ($ruleValue === $itemName)) {
                $itemMatchesCount++;
            }
        }
        
        return $itemMatchesCount;
    }
}

$solution = new Solution();

// Output: 1
echo $solution->countMatches([
    ["phone","blue","pixel"],
    ["computer","silver","lenovo"],
    ["phone","gold","iphone"]], 
    "color", 
    "silver") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 2
echo $solution->countMatches([
    ["phone","blue","pixel"],
    ["computer","silver","phone"],
    ["phone","gold","iphone"]],
    "type", 
    "phone") . PHP_EOL;
echo '---' . PHP_EOL;