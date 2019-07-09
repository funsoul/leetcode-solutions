## 题目

给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。

示例 1:

输入: [1,2,3,4,5,6,7] 和 k = 3
输出: [5,6,7,1,2,3,4]
解释:
向右旋转 1 步: [7,1,2,3,4,5,6]
向右旋转 2 步: [6,7,1,2,3,4,5]
向右旋转 3 步: [5,6,7,1,2,3,4]

示例 2:

输入: [-1,-100,3,99] 和 k = 2
输出: [3,99,-1,-100]
解释: 
向右旋转 1 步: [99,-1,-100,3]
向右旋转 2 步: [3,99,-1,-100]

说明:

尽可能想出更多的解决方案，至少有三种不同的方法可以解决这个问题。
要求使用空间复杂度为 O(1) 的 原地 算法。

## 思路

这个方法基于这个事实：当我们旋转数组 k 次， k % n 个尾部元素会被移动到头部，剩下的元素会被向后移动。

- 我们首先将所有元素反转。
- 然后反转前 k 个元素.
- 再反转后面 n - k 个元素。

## 代码

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $total = count($nums);
        $k %= $total;
        $this->reverse($nums, 0, $total - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, $total - 1);
    }

    function reverse(&$nums, $start, $end) {
        while ($start < $end) {
            $tmp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $tmp;
            $start++;
            $end--;
        }
    }
}
```