#include <stdio.h>
#include <stdbool.h>
#include <stdlib.h>

struct TreeNode {
    int val;
    struct TreeNode *left;
    struct TreeNode *right;
};

void 
destroy(struct TreeNode *p){
    if(p != NULL){
        destroy(p->left);
        destroy(p->right);

        free(p);
        p = NULL;
    }
}

bool 
isMirror(struct TreeNode* t1, struct TreeNode* t2) {
    if (t1 == NULL && t2 == NULL)
        return true;
    if (t1 == NULL || t2 == NULL)
        return false;
    return (t1->val == t2->val)
        && isMirror(t1->left, t2->right)
        && isMirror(t1->right, t2->left);
}

bool 
isSymmetric(struct TreeNode* root) {
    return isMirror(root, root);
}

int 
main(void) {
    struct TreeNode *node1 = malloc(sizeof(struct TreeNode));
    struct TreeNode *node2 = malloc(sizeof(struct TreeNode));
    struct TreeNode *node3 = malloc(sizeof(struct TreeNode));
    node1->val = 1;
    node2->val = 2;
    node3->val = 2;
    node1->left = node2;
    node1->right = node3;

    bool x = isSymmetric(node1);

    destroy(node1);

    printf("%s\n", x ? "true" : "false");

    return 0;
}