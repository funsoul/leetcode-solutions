## 题目

给定一个字符串，找到它的第一个不重复的字符，并返回它的索引。如果不存在，则返回 -1。

案例:

s = "leetcode"
返回 0.

s = "loveleetcode",
返回 2.

## 思路

使用哈希表。
    - 遍历一次，使用哈希表存储每个字符出现的次数。
    - 遍历第二次，查找在哈希表中只存在一次的字符，并返回索引。
    - 空串或找不到不重复的字符，返回-1。

## 代码

```php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if (empty($s)) {
            return -1;
        }

        $map = [];
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            if (isset($map[$s[$i]])) {
                $map[$s[$i]]++;
            } else {
                $map[$s[$i]] = 1;
            }
        }

        for ($i = 0; $i < $len; $i++) {
            if ($map[$s[$i]] == 1) {
                return $i;
            }
        }

        return -1;
    }
}
```