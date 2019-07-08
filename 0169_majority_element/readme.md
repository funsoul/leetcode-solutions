## 题目描述

给定一个大小为 n 的数组，找到其中的众数。众数是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。

你可以假设数组是非空的，并且给定的数组总是存在众数。

示例 1:

输入: [3,2,3]
输出: 3
示例 2:

输入: [2,2,1,1,1,2,2]
输出: 2

## 思路

解决方法：

1. 排序，处于 [ n/2 ] 位置的数字即为众数。
2. 使用哈希表，遍历一次得到每个数字对应的出现次数，大于 [ n/2 ] 次数的即为众数。
3. Boyer-Moore 投票算法，由于众数比其他数出现的次数多，如果把众数记为+1，其他数记为-1，全部数相加，得到的结果一定大于0。遍历一次数组，第一个数作为``候选人``,因为``候选人``即为第一个数，所以得到一个投票[ ``+1`` ]。依次对比下一个数，只要``候选人``和``当前数字``相等就多一票[ ``+1`` ]，否则减一票[ ``-1`` ]。如果总票数变为[ ``0`` ]，``候选人出局``，选择``下一个数字``作为候选人。最终留下来的``候选人``即为众数。

## 代码

### 方法1

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $total = count($nums);
        sort($nums);
        return $nums[intval($total / 2)];
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
    function majorityElement($nums) {
        $total = count($nums);
        $map = [];
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                $map[$num]++;
            } else {
                $map[$num] = 1;
            }

            if ($map[$num] > $total / 2) {
                return $num;
            }
        }
    }
}
```

### 方法3

```php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = 0;
        $candidate = 0;

        foreach ($nums as $num) {
            if ($count == 0) {
                $candidate = $num;
            }

            $count += ($num == $candidate) ? 1 : -1;
        }
        return $candidate;
    }
}
```