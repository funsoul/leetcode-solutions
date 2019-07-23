#include "../utils/utils.h"

struct TreeNode* helper(int* nums, int left, int right) {
    if (left > right)
        return NULL;
    int mid = (left + right) / 2;
    struct TreeNode* node;
    node = (struct TreeNode*)malloc(sizeof(struct TreeNode));
    node->val = nums[mid];
    node->left = helper(nums, left, mid - 1);
    node->right = helper(nums, mid + 1, right);
    return node;
}

struct TreeNode* sortedArrayToBST(int* nums, int numsSize){
    return helper(nums, 0, numsSize - 1);
}

int main(void) {
    int nums[] = {-10, -3, 0, 5, 9};
    int numsSize = 0;
    GET_ARRAY_LEN(nums, numsSize);
    printf("numsSize: %d\n", numsSize);
    struct TreeNode* T = sortedArrayToBST(nums, numsSize);
    preOrderRecursionTraverse(T);
}