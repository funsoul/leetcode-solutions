<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement1($nums) {
        $total = count($nums);
        sort($nums);
        return $nums[intval($total / 2)];
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement2($nums) {
        $total = count($nums);
        $map = [];
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                $map[$num]++;
            } else {
                $map[$num] = 1;
            }

            if ($map[$num] > $total / 2) {
                return $num;
            }
        }
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement3($nums) {
        $count = 0;
        $candidate = 0;

        foreach ($nums as $num) {
            if ($count == 0) {
                $candidate = $num;
            }

            $count += ($num == $candidate) ? 1 : -1;
        }
        return $candidate;
    }

    function main() {
        $nums = [1,2,2,1,2];
//        echo $this->majorityElement1($nums) . PHP_EOL;
//        echo $this->majorityElement2($nums) . PHP_EOL;
        echo $this->majorityElement3($nums) . PHP_EOL;
    }
}

(new Solution())->main();