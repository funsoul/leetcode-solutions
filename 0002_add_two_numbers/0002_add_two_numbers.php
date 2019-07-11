<?php

/**
 * Class ListNode
 *
 * singly-linked list
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) {
        $this->val = $val;
    }
}

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

    function initList($nums) {
        $total = count($nums);

        $node = new ListNode($nums[$total - 1]);
        $root = $node;
        for ($i = $total - 2; $i >= 0 ; $i--) {
            $node = $this->initNode($node, $nums[$i]);
        }

        return $root;
    }

    function initNode($list, $num) {
        $list->next = new ListNode($num);
        return $list->next;
    }

    function main() {
        $nums1 = [3, 4, 2];
        $nums2 = [4, 6, 5];

        $l1 = $this->initList($nums1);
        $l2 = $this->initList($nums2);

        $l3 = $this->addTwoNumbers($l1, $l2);

        var_dump($l3);
    }
}
(new Solution())->main();