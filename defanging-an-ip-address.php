<?php
/*
Defanging an IP Address

Given a valid (IPv4) IP address, return a defanged version of that IP address.

A defanged IP address replaces every period "." with "[.]".

Input: address = "1.1.1.1"
Output: "1[.]1[.]1[.]1"

Input: address = "255.100.50.0"
Output: "255[.]100[.]50[.]0"
*/
class Solution {

    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address) {
        $defangAddress = str_replace('.', '[.]', $address);
        
        return $defangAddress;
    }
}

$solution = new Solution();

// Output: "1[.]1[.]1[.]1"
echo $solution->defangIPaddr("1.1.1.1") . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "255[.]100[.]50[.]0"
echo $solution->defangIPaddr("255.100.50.0") . PHP_EOL;
echo '---' . PHP_EOL;