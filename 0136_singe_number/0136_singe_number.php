<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber1($nums) {
        sort($nums);

        $total = count($nums);
        $index = 0;
        for ($i = 0; $i < $total; $i = $i+2) {
            if ($nums[$i] != $nums[$i+1]) {
                $index = $i;
                break;
            }
        }
        return $nums[$index];
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber2($nums) {
        $a = 0;
        foreach ($nums as $item) {
            $a ^= $item;
        }
        return $a;
    }

    function main() {
        $input = [1,2,2];

//        $output = $this->singleNumber1($input);

        $output = $this->singleNumber2($input);

        echo $output . PHP_EOL;
    }
}

(new Solution())->main();