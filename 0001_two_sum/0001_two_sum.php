<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $total = count($nums);
        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [];
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum2($nums, $target) {
        $map = [];
        foreach ($nums as $key => $num) {
            $other = $target - $num;
            if (isset($map[$other])) {
                return [$map[$other], $key];
            } else {
                $map[$num] = $key;
            }
        }

        return [];
    }

    function main() {
        $nums = [-3, 4, 3];
        $target = 0;

//        var_dump($this->twoSum1($nums, $target));
        var_dump($this->twoSum2($nums, $target));
    }
}

(new Solution())->main();