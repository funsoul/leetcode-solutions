## 题目

给定一个链表，判断链表中是否有环。

为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。 如果 pos 是 -1，则在该链表中没有环。

示例 1：

输入：head = [3,2,0,-4], pos = 1
输出：true
解释：链表中有一个环，其尾部连接到第二个节点。

示例 2：

输入：head = [1,2], pos = 0
输出：true
解释：链表中有一个环，其尾部连接到第一个节点。

示例 3：

输入：head = [1], pos = -1
输出：false
解释：链表中没有环。

## 思路

1. 双指针（快慢指针）
    - 遍历链表，如果快指针为空，或者快指针的下一个节点为空，则终止，返回 false ，表示没有环
    - 快指针向前``走两步``
    - 慢指针向前``走一步``
    - 在某个时刻，快慢指针"相交"于一个节点，则返回 true ，表示有环
2. 使用哈希表，遍历链表时，记录每个节点``是否已经走过``
    - 因为使用了额外的空间，不太符合题目的要求，这里就不实现了

## 代码

### 方法1（php实现）

**在我本地调试是没问题的，但是leetcode上面执行测试用例却返回false，只能作罢，使用c来实现一遍**

```php
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $pos
     * @return Boolean
     */
    function hasCycle($head, $pos) {
        if ($pos < 0) {
            return false;
        }
        
        $fast = $head->next;

        while ($fast && $fast->next) {
            if ($head == $fast) {
                return true;
            }

            $head = $head->next;
            $fast = $fast->next->next;
        }

        return false;
    }
}
```

### 方法1（c实现）

```c
bool hasCycle(struct ListNode *head) {
    if (head == NULL || head->next == NULL) {
        return false;
    }

    struct ListNode *fast = head->next;

    while (fast != NULL && fast->next != NULL) {
        if (head == fast) {
            return true;
        }

        head = head->next;
        fast = fast->next->next;
    }

    return false;
}
```