## 题目

给定一个整数数组，判断是否存在重复元素。

如果任何值在数组中出现至少两次，函数返回 true。如果数组中每个元素都不相同，则返回 false。

示例 1:

输入: [1,2,3,1]
输出: true
示例 2:

输入: [1,2,3,4]
输出: false
示例 3:

输入: [1,1,1,3,3,4,3,2,4,2]
输出: true

## 思路

使用哈希表。
    - 遍历数组，存元素到哈希表中。
    - 如果哈希表已存在该元素，返回 true。
    - 遍历完返回 false

## 代码

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums) {
        $map = [];

        foreach ($nums as $num) {
            if (isset($map[$num])) {
                return true;
            } else {
                $map[$num] = 1;
            }
        }

        return false;
    }
}
```