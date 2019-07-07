<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $len = count($nums);
        $slow = $fast = 0;

        for (; $fast < $len; $fast++) {
            if ($nums[$slow] != $nums[$fast]) {
                $slow++;
                $nums[$slow] = $nums[$fast];
            }
            echo $slow . PHP_EOL;
        }
        return $slow + 1;
    }

    public function main()
    {
        $nums = [0,0,1,1,1,2,2,3,3,4];
        $this->removeDuplicates($nums);
    }
}

(new Solution())->main();