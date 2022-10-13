<?php
/*
Count Common Words With One Occurrence

Given two string arrays words1 and words2, return the number of strings that appear 
exactly once in each of the two arrays.

Input: words1 = ["leetcode","is","amazing","as","is"], 
       words2 = ["amazing","leetcode","is"]
Output: 2
Explanation:
             - "leetcode" appears exactly once in each of the two arrays. We count 
               this string.
             - "amazing" appears exactly once in each of the two arrays. We count 
                this string.
             - "is" appears in each of the two arrays, but there are 2 occurrences 
                of it in words1. We do not count this string.
             - "as" appears once in words1, but does not appear in words2. We do 
               not count this string.
            Thus, there are 2 strings that appear exactly once in each of the two 
            arrays.

Input: words1 = ["b","bb","bbb"], words2 = ["a","aa","aaa"]
Output: 0
Explanation: There are no strings that appear in each of the two arrays.

Input: words1 = ["a","ab"], words2 = ["a","a","a","ab"]
Output: 1
Explanation: The only string that appears exactly once in each of the two arrays is 
             "ab".
*/
class Solution {

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return Integer
     */
    function countWords($words1, $words2) {
        $words1Count = count($words1);
        $words2Count = count($words2);
        
        $words1OccourrenceCountArr = [];
        $words2OccourrenceCountArr = [];
        
        for($i = 0; $i < $words1Count; $i++) {
            $word = $words1[$i];
            
            $words1OccourrenceCountArr[$word] = ($words1OccourrenceCountArr[$word] ?? 0) + 1;
        }
        
        // sort by occourrence (values) ascending
        asort($words1OccourrenceCountArr);
        
        for($i = 0; $i < $words2Count; $i++) {
            $word = $words2[$i];
            
            $words2OccourrenceCountArr[$word] = ($words2OccourrenceCountArr[$word] ?? 0) + 1;
        }
        
        // sort by occourrence (values) ascending
        asort($words2OccourrenceCountArr);
        
        
        $uniqueWords1Arr = [];
        foreach($words1OccourrenceCountArr as $word => $occourrenceCount) {
            // use only words with occourrence of 1, ignore all other
            if($occourrenceCount > 1) {
                break;
            }
            
            $uniqueWords1Arr[] = $word;
        }
        
        $uniqueWords2Arr = [];
        foreach($words2OccourrenceCountArr as $word => $occourrenceCount) {
            // use only words with occourrence of 1, ignore all other
            if($occourrenceCount > 1) {
                break;
            }
            
            $uniqueWords2Arr[] = $word;
        }
        
        // echo var_export($uniqueWords1Arr, true) . PHP_EOL;
        // echo var_export($uniqueWords2Arr, true) . PHP_EOL;
        
        $intersectWordsArr = array_intersect($uniqueWords1Arr, $uniqueWords2Arr);
        
        echo var_export($intersectWordsArr, true) . PHP_EOL;
        echo '---' . PHP_EOL;
        
        return count($intersectWordsArr);
    }
}

$solution = new Solution();

// Output: 2
echo $solution->countWords([
    "leetcode","is","amazing","as","is"],  
    ["amazing","leetcode","is"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 0
echo $solution->countWords(["b","bb","bbb"], ["a","aa","aaa"]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 1
echo $solution->countWords(["a","ab"], ["a","a","a","ab"]) . PHP_EOL;
echo '---' . PHP_EOL;