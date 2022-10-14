<?php
/*
Decode the Message

You are given the strings key and message, which represent a cipher key and a 
secret message, respectively. The steps to decode message are as follows:

1. Use the first appearance of all 26 lowercase English letters in key as the order 
   of the substitution table.
2. Align the substitution table with the regular English alphabet.
3. Each letter in message is then substituted using the table.
4. Spaces ' ' are transformed to themselves.

   * For example, given key = "happy boy" (actual key would have at least one 
     instance of each letter in the alphabet), we have the partial substitution 
     table of 
     ('h' -> 'a', 'a' -> 'b', 'p' -> 'c', 'y' -> 'd', 'b' -> 'e', 'o' -> 'f').

Return the decoded message.

Input: key = "the quick brown fox jumps over the lazy dog", 
       message = "vkbs bs t suepuv"
Output: "this is a secret"
Explanation: The diagram above shows the substitution table.
             It is obtained by taking the first appearance of each letter in 
             "the quick brown fox jumps over the lazy dog".
             -> thequickbrownfxjmpsvlazydg

Input: key = "eljuxhpwnyrdgtqkviszcfmabo",
       message = "zwx hnfx lqantp mnoeius ycgk vcnjrdb"
Output: "the five boxing wizards jump quickly"
Explanation: The diagram above shows the substitution table.
             It is obtained by taking the first appearance of each letter in 
             "eljuxhpwnyrdgtqkviszcfmabo".
             -> eljuxhpwnyrdgtqkviszcfmabo
*/
class Solution {

    /**
     * @param String $key
     * @param String $message
     * @return String
     */
    function decodeMessage($key, $message) {
        $substitutionTableArr = [];
        $l = strlen($key);
        for($i = 0; $i < $l; $i++) {
            $keyChar = $key[$i];
            
            if($keyChar === ' ') {
                // ignore space
                continue;
            }
            
            if(in_array($keyChar, $substitutionTableArr) === false) {
                // first occourrence of char, add to substitution table
                $substitutionTableArr[] = $keyChar;
            }
        }
        
        $englishTableArr = []; // "abcdefghklmnopqrstuvwxyz";
        $char = 'a';
        foreach($substitutionTableArr as $substitutionEntry) {
            $englishTableArr[$substitutionEntry] = $char;
            
            $char = chr(ord($char) + 1);
        }
        
        $decryptedMessage = "";
        $l = strlen($message);
        for($i = 0; $i < $l; $i++) {
            $messageChar = $message[$i];
            
            if($messageChar === ' ') {
                // output space directly
                $decryptedMessage .= ' ';
            } else {
                // find decrypted char in english table 
                $decryptedMessage .= $englishTableArr[$messageChar];
            }
        }
        
        echo var_export($englishTableArr, true) . PHP_EOL;
        echo '---' . PHP_EOL;
        
        return $decryptedMessage;
    }
}

$solution = new Solution();

// Output: "this is a secret"
echo $solution->decodeMessage(
    "the quick brown fox jumps over the lazy dog", 
    "vkbs bs t suepuv") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "the five boxing wizards jump quickly"
echo $solution->decodeMessage(
    "eljuxhpwnyrdgtqkviszcfmabo", 
    "zwx hnfx lqantp mnoeius ycgk vcnjrdb"
) . PHP_EOL;
echo '---' . PHP_EOL;
