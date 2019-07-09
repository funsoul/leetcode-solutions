<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $total = count($nums);
        $k %= $total;
        $this->reverse($nums, 0, $total - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, $total - 1);
    }

    function reverse(&$nums, $start, $end) {
        while ($start < $end) {
            $tmp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $tmp;
            $start++;
            $end--;
        }
    }

    function main() {
        $nums = [1,2,3,4,5,6,7];
        $k = 3;
        $this->rotate($nums, $k);

        var_dump($nums);
    }
}

(new Solution())->main();
