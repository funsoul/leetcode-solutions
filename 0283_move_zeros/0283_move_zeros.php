<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $total = count($nums);
        for ($slow = 0, $current = 0; $current < $total; $current++) {
            if ($nums[$current] != 0) {
                $tmp = $nums[$slow];
                $nums[$slow] = $nums[$current];
                $nums[$current] = $tmp;

                $slow++;
            }
        }
    }

    function main() {
        $nums = [0,1,0,3,12];
        $this->moveZeroes($nums);
        var_dump($nums);
    }
}
(new Solution())->main();