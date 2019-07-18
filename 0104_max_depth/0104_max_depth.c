#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>

struct TreeNode {
    int val;
    struct TreeNode *left;
    struct TreeNode *right;
};

int maxDepth(struct TreeNode* root){
    int deep = 0;
    if (root != NULL) {
        int leftdeep = maxDepth(root->left);
        int rightdeep = maxDepth(root->right);
        deep = leftdeep >= rightdeep ? leftdeep + 1 : rightdeep + 1;
    }

    return deep;
}