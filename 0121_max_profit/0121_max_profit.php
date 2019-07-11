<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit1($prices) {
        $total = count($prices);

        $max = 0;

        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                $profit = $prices[$j] - $prices[$i];
                if ($profit > $max) {
                    $max = $profit;
                }
            }
        }

        return $max;
    }

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit2($prices) {
        $total = count($prices);
        $minPrice = PHP_INT_MAX;
        $maxProfit = 0;

        for ($i = 0; $i < $total; $i++) {
            if ($minPrice > $prices[$i]) {
                $minPrice = $prices[$i];
            }

            $profit = $prices[$i] - $minPrice;
            if ($profit > $maxProfit) {
                $maxProfit = $profit;
            }
        }

        return $maxProfit;
    }

    function main() {
        $prices = [7,1,5,3,6,4];
//        echo $this->maxProfit1($prices) . PHP_EOL;
        echo $this->maxProfit2($prices) . PHP_EOL;
    }
}

(new Solution())->main();