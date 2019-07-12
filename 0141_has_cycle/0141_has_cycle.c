/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */
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