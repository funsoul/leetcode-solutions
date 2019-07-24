#include "../utils/utils.h"

int isba_dfs(struct TreeNode* root)
{
    if (root == NULL) return 0;
    int left_layer = isba_dfs(root->left);
    if (left_layer < 0) return -1;
    
    int right_layer = isba_dfs(root->right);
    if (right_layer < 0) return -1;
    
    int tmp = left_layer - right_layer;

    if ((tmp >= -1) && (tmp <= 1)) {
        return (1 + (left_layer > right_layer ? left_layer : right_layer));
    }
    return -1;   
}

bool isBalanced(struct TreeNode* root){
    return (isba_dfs(root) < 0 ? false : true);
}

int main(void) {
    BTree T = NULL;
    createBTree(T);
    bool ans = isBalanced(T);
    printf(ans ? "true" : "false");
}