## 题目

给出两个 「非空」 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 「逆序」 的方式存储的，并且它们的每个节点只能存储 「一位」 数字。

如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。

您可以假设除了数字 0 之外，这两个数都不会以 0 开头。

示例：

输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
输出：7 -> 0 -> 8
原因：342 + 465 = 807

## 思路

- 先复制一个临时链表``tmpList``出来，以免丢失链表头节点
- 初始化十进制进位``carry``为0
- 遍历临时链表``tmpList``，累加``tmpList``和``l2``和``进位``的值
- 得到累加值后，对10``取余``即为当前位的``最终值``
- 累加值只可能在[0～20)之间，所以，如果累加值大于10，则进一位（1），否则不进位（0）
- 有可能两个数的长度不一样（比如，15 + 105），所以，如果有一个数的next指针位``null``，需要进行``补零``
- 终止条件：
    - 临时链表遍历完（next指针为null）
    - 两个链表同时遍历完，且向前进位
- 结束遍历，返回链表1的头节点即可

## 代码

```php
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $tmpList = $l1;
        $carry = 0;

        do {
            $val = $tmpList->val + $l2->val + $carry;
            $tmpList->val = $val % 10;
            $carry = $val >= 10 ? 1 : 0;

            if (!$l2->next && !$tmpList->next && $carry) {
                $tmpList->next = new ListNode(1);
                break;
            }

            if ($tmpList->next && !$l2->next) {
                $l2->next = new ListNode(0);
            }

            if ($l2->next && !$tmpList->next) {
                $tmpList->next = new ListNode(0);
            }

            $tmpList = $tmpList->next;
            $l2 = $l2->next;

        } while ($tmpList);

        return $l1;
    }
}
```