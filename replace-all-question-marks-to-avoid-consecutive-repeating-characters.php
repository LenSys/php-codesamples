<?php
/*
Replace All ?'s to Avoid Consecutive Repeating Characters

Given a string s containing only lowercase English letters and the '?' character, 
convert all the '?' characters into lowercase letters such that the final string does 
not contain any consecutive repeating characters. You cannot modify the non '?' characters.

It is guaranteed that there are no consecutive repeating characters in the given string 
except for '?'. 
Return the final string after all the conversions (possibly zero) have been made. If 
there is more than one solution, return any of them. It can be shown that an answer is 
always possible with the given constraints.

Input: s = "?zs"
Output: "azs"
Explanation: There are 25 solutions for this problem. From "azs" to "yzs", all are valid. 
Only "z" is an invalid modification as the string will consist of consecutive repeating 
characters in "zzs".

Input: s = "ubv?w"
Output: "ubvaw"
Explanation: There are 24 solutions for this problem. Only "v" and "w" are invalid 
modifications as the strings will consist of consecutive repeating characters in "ubvvw" 
and "ubvww".
*/
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function modifyString($s) {
        $invalidChars = [];
        
        // get all chars except '?'
        for($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if($char !== '?') {
                $invalidChars[$char] = 1;
            }
        }
        
        $invalidChars = array_keys($invalidChars);
        $sequence = $s;
        
        do {
            $questionMarkPosition = false;
            $invalidChars = array_unique($invalidChars);
            // echo var_export($invalidChars, true);

            $hasValidChar = false;
            for($i = ord('a'); $i <= ord('z'); $i++) {
                $currentChar = chr($i);

                // check if current character is in invalid chars array
                if(in_array($currentChar, $invalidChars) !== false) {
                    // ignore current character
                    continue;
                } else {
                    // found valid char
                    $hasValidChar = true;

                    $questionMarkPosition = strpos($sequence, '?');

                    if($questionMarkPosition !== false) {
                        // check previous char
                        if($questionMarkPosition - 1 >= 0) {
                            $previousChar = substr($sequence, $questionMarkPosition - 1, 1);
                        } else {
                            $previousChar = '';
                        }
                        
                        // check next char
                        if($questionMarkPosition + 1 < strlen($sequence)) {
                            $nextChar = substr($sequence, $questionMarkPosition + 1, 1);
                        } else {
                            $nextChar = '';
                        }
                        
                        // echo 'p(' . $previousChar . ') n(' . $nextChar . ')' . PHP_EOL; 
                        
                        if($currentChar === $previousChar) {
                            $invalidChars[] = $currentChar;
                            continue;
                        } else if($currentChar === $nextChar) {
                            $invalidChars[] = $currentChar;
                            continue;
                        }
                        
                        // replace question mark
                        $sequence[$questionMarkPosition] = $currentChar;

                        $invalidChars[] = $currentChar;
                    }

                    break;
                }   
            }
            
            if(count($invalidChars) >= 26) {
                // all chars have been used, restart again
                $invalidChars = [];
            }

            // echo $sequence . PHP_EOL;
        } while($questionMarkPosition !== false);
        
        return $sequence;
    }
}

$solution = new Solution();

// Output: "azs"
echo $solution->modifyString("?zs") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "ubvaw"
echo $solution->modifyString("ubv?w") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuv"
echo $solution->modifyString("????????????????????????????????????????????????????????????????????????????????????????????????????") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "vhlpsgmwbadczgnebafdyaghijkbltmnopjqragstqmuvwxytzimxafbcgcdeafghiorbjkeluvaemaknopqrasetufvwqg"
echo $solution->modifyString("v????gm??a?czgn?ba?dya?????b?t????j??ag??qm?????t?imx?f??gc??a????orb??e?uvae?ak?????a?e??f??qg") . PHP_EOL;
echo '---' . PHP_EOL;
