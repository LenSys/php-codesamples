<?php
/*
Valid Parentheses

Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', 
determine if the input string is valid.

An input string is valid if:

Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.
Every close bracket has a corresponding open bracket of the same type.

Input: s = "()"
Output: true

Input: s = "()[]{}"
Output: true

Input: s = "(]"
Output: false
*/

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        
        $parenthesesStack = [];
        for($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            
            if($char === '(') {
                array_push($parenthesesStack, $char);
            } else if($char === '[') {
                array_push($parenthesesStack, $char);
            } else if($char === '{') {
                array_push($parenthesesStack, $char);
            } else {
                if(count($parenthesesStack) > 0) {
                    $lastParenthese = $parenthesesStack[count($parenthesesStack) - 1];
                } else {
                    $lastParenthese = '';
                }
                $expectedParenthese = $this->getExpectedOpeningParentheses($char);
                
                if($expectedParenthese === $lastParenthese) {
                    array_pop($parenthesesStack);
                } else {
                    array_push($parenthesesStack, $char);
                }
            }
        }
        
        // echo count($parenthesesStack) . PHP_EOL;
        // echo var_export($parenthesesStack, true) . PHP_EOL;
        
        return (count($parenthesesStack) === 0);
    }
    
    
    function getExpectedOpeningParentheses($closingParenthese) {
        if($closingParenthese === ')') {
            return '(';
        } else if($closingParenthese === ']') {
            return '[';
        } else if($closingParenthese === '}') {
            return '{';
        } else {
            return ' ';
        }
    }
}

$solution = new Solution();

// Output: true
echo var_export($solution->isValid("()"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->isValid("()[]{}"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->isValid("(]"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: true
echo var_export($solution->isValid("{[]}"), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: false
echo var_export($solution->isValid("]"), true) . PHP_EOL;
echo '---' . PHP_EOL;
