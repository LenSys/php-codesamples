<?php
/*
Richest Customer Wealth

You are given an m x n integer grid accounts where accounts[i][j] is the amount of 
money the i​​​​​​​​​​​th​​​​ customer has in the j​​​​​​​​​​​th​​​​ bank. Return the wealth that the richest 
customer has.

A customer's wealth is the amount of money they have in all their bank accounts. 
The richest customer is the customer that has the maximum wealth.

Input: accounts = [[1,2,3],[3,2,1]]
Output: 6
Explanation:
             1st customer has wealth = 1 + 2 + 3 = 6
             2nd customer has wealth = 3 + 2 + 1 = 6
             Both customers are considered the richest with a wealth of 6 each, so return 6.

Input: accounts = [[1,5],[7,3],[3,5]]
Output: 10
Explanation: 
             1st customer has wealth = 6
             2nd customer has wealth = 10 
             3rd customer has wealth = 8
             The 2nd customer is the richest with a wealth of 10.

Input: accounts = [[2,8,7],[7,1,3],[1,9,5]]
Output: 17
*/
class Solution {

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts) {
        $accountsCount = count($accounts);
        $richestCustomerWealth = 0;
        
        for($i = 0; $i < $accountsCount; $i++) {
            $currentCustomer = $accounts[$i];
            
            $currentWealth = array_sum($currentCustomer);
            
            if($currentWealth > $richestCustomerWealth) {
                $richestCustomerWealth = $currentWealth;
            }
        }
        
        return $richestCustomerWealth;
    }
}

$solution = new Solution();

// Output: 6
echo $solution->maximumWealth([[1,2,3],[3,2,1]]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 10
echo $solution->maximumWealth([[1,5],[7,3],[3,5]]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: 17
echo $solution->maximumWealth([[2,8,7],[7,1,3],[1,9,5]]) . PHP_EOL;
echo '---' . PHP_EOL;