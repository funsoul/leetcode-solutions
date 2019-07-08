## 题目

给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。

你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。

示例:

给定 nums = [2, 7, 11, 15], target = 9

因为 nums[0] + nums[1] = 2 + 7 = 9
所以返回 [0, 1]

## 思路

1. 暴力法。通过两次遍历，得到的值求和后，与target对比。
2. 哈希表。
    - 一次遍历，使用target依次减去``当前数字``得到``差值``
    - 使用哈希表存放``数字与索引的映射``
    - 如果``差值``存在哈希表中，返回
    - 如果不存在，继续保存``当前数字``的映射到哈希表中

## 代码

### 方法1

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $total = count($nums);
        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [];
    }
}
```

### 方法2

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $map = [];
        foreach ($nums as $key => $num) {
            $other = $target - $num;
            if (isset($map[$other])) {
                return [$map[$other], $key];
            } else {
                $map[$num] = $key;
            }
        }

        return [];
    }
}
```