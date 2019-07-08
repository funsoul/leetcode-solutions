<?php

class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString1(&$s) {
        $total = count($s);
        $left = 0;
        $right = $total - 1;

        while ($left <= $right) {
            $tmp = $s[$right];
            $s[$right] = $s[$left];
            $s[$left] = $tmp;

            $left++;
            $right--;
        }
    }

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString2(&$s) {
        $total = count($s);
        $left = 0;
        $right = $total - 1;

        while ($left < $right) {
            $s[$left] ^= $s[$right];
            $s[$right] ^= $s[$left];
            $s[$left] ^= $s[$right];

            $left++;
            $right--;
        }
    }

    function main() {
        $s = ["h","e","l","l","o"];
//        $this->reverseString1($s);
        $this->reverseString2($s);
        var_dump($s);
    }
}

(new Solution())->main();