<?php
/*
Final Prices With a Special Discount in a Shop

You are given an integer array prices where prices[i] is the price of the ith item 
in a shop.

There is a special discount for items in the shop. If you buy the ith item, then 
you will receive a discount equivalent to prices[j] where j is the minimum index 
such that j > i and prices[j] <= prices[i]. Otherwise, you will not receive any 
discount at all.

Return an integer array answer where answer[i] is the final price you will pay for 
the ith item of the shop, considering the special discount.

Input: prices = [8,4,6,2,3]
Output: [4,2,4,2,3]
Explanation: 
             For item 0 with price[0]=8 you will receive a discount equivalent to 
             prices[1]=4, therefore, the final price you will pay is 8 - 4 = 4.
             For item 1 with price[1]=4 you will receive a discount equivalent to 
             prices[3]=2, therefore, the final price you will pay is 4 - 2 = 2.
             For item 2 with price[2]=6 you will receive a discount equivalent to 
             prices[3]=2, therefore, the final price you will pay is 6 - 2 = 4.
             For items 3 and 4 you will not receive any discount at all.

Input: prices = [1,2,3,4,5]
Output: [1,2,3,4,5]
Explanation: In this case, for all items, you will not receive any discount at all.

Input: prices = [10,1,1,6]
Output: [9,0,1,6]
*/
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer[]
     */
    function finalPrices($prices) {
        
        $pricesCount = count($prices);
        $answer = [];
        for($i = 0; $i < $pricesCount; $i++) {
            $price = $prices[$i];
            
            for($j = $i + 1; $j < $pricesCount; $j++) {
                $discount = $prices[$j];
                // echo "d(" . $price . ') -> ' . $discount . PHP_EOL;
                
                if($discount <= $price) {
                    echo "d(" . $price . ') -> ' . $discount . PHP_EOL;
                    $price -= $discount;
                    break;
                }
            }
            
            $answer[] = $price;
        }
        echo '---' . PHP_EOL;
        
        return $answer;
    }
}

$solution = new Solution();

// Output: [4,2,4,2,3]
echo var_export($solution->finalPrices([8,4,6,2,3]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [1,2,3,4,5]
echo var_export($solution->finalPrices([1,2,3,4,5]), true) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: [9,0,1,6]
echo var_export($solution->finalPrices([10,1,1,6]), true) . PHP_EOL;
echo '---' . PHP_EOL;