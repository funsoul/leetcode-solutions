<?php


/**
 * Class ListNode
 *
 * a singly-linked list.
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

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

    function main() {
        $node1 = new ListNode(3);
        $node2 = new ListNode(2);
        $node3 = new ListNode(0);
        $node4 = new ListNode(-4);

        $node1->next = $node2;
        $node2->next = $node3;
        $node3->next = $node4;
        $node4->next = $node2;

        var_dump($node1);

        var_dump($this->hasCycle($node1, 1));
    }
}

(new Solution())->main();