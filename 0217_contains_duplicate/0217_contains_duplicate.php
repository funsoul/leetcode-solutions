<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $map = [];

        foreach ($nums as $num) {
            if (isset($map[$num])) {
                return true;
            } else {
                $map[$num] = 1;
            }
        }

        return false;
    }

    function main() {
        $nums = [1,2,3];
        var_dump($this->containsDuplicate($nums));
    }
}

(new Solution())->main();