<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = strtolower(preg_replace("/[^a-zA-Z0-9]+/","", $s));

        $len = strlen($s);
        $left = 0;
        $right = $len - 1;
        while ($left <= $right) {
            if ($s[$left] == $s[$right]) {
                $left++;
                $right--;
            } else {
                return false;
            }
        }
        return true;
    }

    function main() {
        $s = "A man, a plan, a canal: Panama";
        var_dump($this->isPalindrome($s));
    }
}

(new Solution())->main();