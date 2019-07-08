## 题目

给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。

说明：本题中，我们将空字符串定义为有效的回文串。

示例 1:

输入: "A man, a plan, a canal: Panama"
输出: true
示例 2:

输入: "race a car"
输出: false

## 思路

1. 双指针。
    - 使用左右指针向中间扫描，扫描时，左指针[ ``+1`` ]，右指针[ ``-1`` ]
    - 比较左右指针对应的值是否相等
    - 不等，返回 false
    - 相等，继续往中间移动
    - 当左指针大于右指针时，扫描结束，返回 true

## 代码

```php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $s = strtolower(preg_replace("/[^a-zA-Z0-9]+/","", $s));

        $len = strlen($s);
        $left = 0;
        $right = $len - 1;
        while ($left <= $right) {
            if ($s[$left] == $s[$right]) {
                $left++;
                $right--;
            } else {
                return false;
            }
        }
        return true;
    }
}
```