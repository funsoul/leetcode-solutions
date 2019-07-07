<?php
class Solution {

    /**
    * @param String $s
    * @return Boolean
    */
    function isValid($s) {
        if (empty($s)) {
            return true;
        }

        $map = [
            '(' => ')',
            '[' => ']',
            '{' => '}'
        ];

        $stack = [];
        $lefts = array_keys($map);

        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if (in_array($s[$i], $lefts)) {
                $stack[] = $s[$i];
            } else {
                $left = array_pop($stack);
                if (isset($map[$left]) && $map[$left] == $s[$i]) {
                    continue;
                } else {
                    return false;
                }
            }
        }
        return empty($stack) ? true : false;
    }

    public function main()
    {
        $str = '[';
        var_dump( $this->isValid($str) );
    }
}

(new Solution())->main();