<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if (empty($s)) {
            return -1;
        }

        $map = [];
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            if (isset($map[$s[$i]])) {
                $map[$s[$i]]++;
            } else {
                $map[$s[$i]] = 1;
            }
        }

        for ($i = 0; $i < $len; $i++) {
            if ($map[$s[$i]] == 1) {
                return $i;
            }
        }

        return -1;
    }

    function main() {
        $s = "loveleetcode";
        echo $this->firstUniqChar($s) . PHP_EOL;
    }
}

(new Solution())->main();