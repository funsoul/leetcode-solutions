<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $total = count($nums1);

        for ($i = $m, $j = 0; $i < $total && $j < $n; $i++, $j++) {
            $nums1[$i] = $nums2[$j];
        }

        for ($i = $m; $i < $total; $i++) {
            $key = $nums1[$i];
            $j = $i - 1;
            while ($j >= 0 && $nums1[$j] > $key) {
                $nums1[$j+1] = $nums1[$j];
                $j--;
            }
            $nums1[$j+1] = $key;
        }
    }

    public function main()
    {
        $nums1 = [1,2,3,0,0,0];
        $nums2 = [1,3,4];
        $this->merge($nums1, 3, $nums2, 3);
        print_r($nums1);
    }
}

(new Solution())->main();