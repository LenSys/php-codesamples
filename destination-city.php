<?php
/*
Destination City

You are given the array paths, where paths[i] = [cityAi, cityBi] means there exists 
a direct path going from cityAi to cityBi. Return the destination city, that is, the 
city without any path outgoing to another city.

It is guaranteed that the graph of paths forms a line without any loop, therefore, 
there will be exactly one destination city.

Input: paths = [["London","New York"],["New York","Lima"],["Lima","Sao Paulo"]]
Output: "Sao Paulo" 
Explanation: Starting at "London" city you will reach "Sao Paulo" city which is the 
destination city. Your trip consist of: "London" -> "New York" -> "Lima" -> "Sao Paulo".

Input: paths = [["B","C"],["D","B"],["C","A"]]
Output: "A"
Explanation: All possible trips are: 
             "D" -> "B" -> "C" -> "A". 
             "B" -> "C" -> "A". 
             "C" -> "A". 
             "A". 
             Clearly the destination city is "A".

Input: paths = [["A","Z"]]
Output: "Z"

*/
class Solution {

    /**
     * @param String[][] $paths
     * @return String
     */
    function destCity($paths) {
        $startCityArr = [];
        $destinationCityArr = [];
        
        foreach($paths as $cities) {
            $startCity = $cities[0];
            $destinationCity = $cities[1];
            
            array_push($startCityArr, $startCity);
            array_push($destinationCityArr, $destinationCity);
        }
        
        echo var_export($startCityArr, true) . PHP_EOL;
        echo var_export($destinationCityArr, true) . PHP_EOL;
        
        $targetDestinationCity = '';
        foreach($destinationCityArr as $destinationCity) {
            if(array_search($destinationCity, $startCityArr) === false) {
                // found destination city with no start city
                $targetDestinationCity = $destinationCity;
                break;
            }
        }
        
        return $targetDestinationCity;
    }
}

$solution = new Solution();

// Output: "Sao Paulo"
echo $solution->destCity([["London","New York"],["New York","Lima"],["Lima","Sao Paulo"]]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "A"
echo $solution->destCity([["B","C"],["D","B"],["C","A"]]) . PHP_EOL;
echo '---' . PHP_EOL;

// Output: "Z"
echo $solution->destCity([["A","Z"]]) . PHP_EOL;
echo '---' . PHP_EOL;