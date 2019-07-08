<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix1($matrix, $target) {
        $len = count($matrix[0]);
        foreach ($matrix as $first) {
            if ($first[0] == $target || $first[$len - 1] == $target) {
                return true;
            }

            if ($first[0] < $target && $first[$len - 1] > $target) {
                for ($i = 1; $i <= $len - 2; $i++) {
                    if ($target == $first[$i]) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix2($matrix, $target) {
        $totalRow = count($matrix);
        $totalCol = count($matrix[0]);

        $col = 0;
        $row = $totalRow - 1;
        while ($row >= 0 && $col <= $totalCol - 1) {
            if ($matrix[$row][$col] > $target) {
                $row--;
            } else if ($matrix[$row][$col] < $target) {
                $col++;
            } else {
                return true;
            }
        }

        return false;
    }

    function main() {
        $matrix = [
            [1,   4,  7, 11, 15],
            [2,   5,  8, 12, 19],
            [3,   6,  9, 16, 22],
            [10, 13, 14, 17, 24],
            [18, 21, 23, 26, 30]
        ];

        $target = 5;

//        var_dump($this->searchMatrix1($matrix, $target));
        var_dump($this->searchMatrix2($matrix, $target));
    }
}

(new Solution())->main();