## 题目

给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。

示例:

输入: [0,1,0,3,12]
输出: [1,3,12,0,0]

说明:

必须在原数组上操作，不能拷贝额外的数组。
尽量减少操作次数。

## 思路

使用双指针。

## 代码

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $total = count($nums);
        for ($slow = 0, $current = 0; $current < $total; $current++) {
            if ($nums[$current] != 0) {
                $tmp = $nums[$slow];
                $nums[$slow] = $nums[$current];
                $nums[$current] = $tmp;

                $slow++;
            }
        }
    }
}   
```