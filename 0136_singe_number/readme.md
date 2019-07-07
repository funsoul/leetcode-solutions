## 题目描述

给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。

## 说明

你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？

示例 1:

输入: [2,2,1]
输出: 1
示例 2:

输入: [4,1,2,1,2]
输出: 4

## 思路

关键点：

- 目标数字只出现一次
- 其余每个元素均出现两次

解决方法：

1. 排序，以两位数字为一个单位往后扫描，如果当前两位数字不等，则第一位数字为目标数字
2. 异或运算（XOR）

## 异或运算（XOR）

```vim

a ^ 0 = a

a ^ a = 0

a ^ b ^ a = (a ^ a) ^ b = 0 ^ b = b

```

## 代码

### 方法1

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        sort($nums);

        $total = count($nums);
        $index = 0;
        for ($i = 0; $i < $total; $i = $i+2) {
            if ($nums[$i] != $nums[$i+1]) {
                $index = $i;
                break;
            }
        }
        return $nums[$index];
    }
}
```

### 方法2

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $a = 0;
        foreach ($nums as $item) {
            $a ^= $item;
        }
        return $a;
    }
}
```