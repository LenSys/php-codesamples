<?php
/*
Unique Email Addresses

Every valid email consists of a local name and a domain name, separated by the 
'@' sign. Besides lowercase letters, the email may contain one or more '.' or '+'.

For example, in "alice@leetcode.com", "alice" is the local name, and "leetcode.com" 
is the domain name. If you add periods '.' between some characters in the local name 
part of an email address, mail sent there will be forwarded to the same address 
without dots in the local name. Note that this rule does not apply to domain names.

For example, "alice.z@leetcode.com" and "alicez@leetcode.com" forward to the same 
email address. If you add a plus '+' in the local name, everything after the first 
plus sign will be ignored. This allows certain emails to be filtered. Note that 
this rule does not apply to domain names.

For example, "m.y+name@email.com" will be forwarded to "my@email.com".
It is possible to use both of these rules at the same time.

Given an array of strings emails where we send one email to each emails[i], return 
the number of different addresses that actually receive mails.

Input: emails = ["test.email+alex@leetcode.com","test.e.mail+bob.cathy@leetcode.com",
"testemail+david@lee.tcode.com"]
Output: 2
Explanation: "testemail@leetcode.com" and "testemail@lee.tcode.com" actually receive 
             mails.

Input: emails = ["a@leetcode.com","b@leetcode.com","c@leetcode.com"]
Output: 3
*/
class Solution {
    
    /**
     * @param String[] $emails
     * @return Integer
     */
    function numUniqueEmails($emails) {
        $validEmailsArr = [];
        foreach($emails as $email) {
            list($localName, $domainName) = explode('@', $email);

            // echo var_export($localName, true) . PHP_EOL;
            // echo var_export($domainName, true) . PHP_EOL;
            // echo '---' . PHP_EOL;

            // remove dot from localname
            $localName = str_replace('.', '', $localName);
            
            // remove everything after plus sign from localname
            if(strstr($localName, '+') !== false) {
                list($localName, $remainingName) = explode('+', $localName);
            }
            
            // rebuild email
            $email = $localName . '@' . $domainName;
            
            if(!in_array($email, $validEmailsArr)) {
                array_push($validEmailsArr, $email);
            }
        }
        
        echo var_export($validEmailsArr, true) . PHP_EOL;
        
        return count($validEmailsArr);
    }
}

$solution = new Solution();

// Output: 2
echo $solution->numUniqueEmails([
    "test.email+alex@leetcode.com",
    "test.e.mail+bob.cathy@leetcode.com",
    "testemail+david@lee.tcode.com"
    ]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 3
echo $solution->numUniqueEmails(["a@leetcode.com","b@leetcode.com","c@leetcode.com"]) . PHP_EOL;
echo '---' . PHP_EOL;