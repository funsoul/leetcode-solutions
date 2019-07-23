#include "../utils/utils.h"

int calcTreeSize(struct TreeNode* root){  
    if (root == NULL)  
        return 0;  
    return 1 + calcTreeSize(root->left) + calcTreeSize(root->right);          
}  

int kthSmallest1(struct TreeNode* root, int k){
    if (root == NULL)
        return 0;
    int leftSize = calcTreeSize(root->left);  
    if (k == leftSize + 1) {
        return root->val;
    } else if (leftSize >= k) {
        return kthSmallest1(root->left, k);
    } else {
        return kthSmallest1(root->right, k - leftSize - 1);
    }
}

void kthNode(struct TreeNode *root, int k, int *index, int *val) {
    if (root == NULL) 
        return;
    
    kthNode(root->left, k, index, val);
    if (*index == k) {
        *val = root->val;
    }
    (*index)++;
    kthNode(root->right, k, index, val);
}

int kthSmallest2(struct TreeNode* root, int k) {
    int val;
    int index = 1;
    kthNode(root, k, &index, &val);
    return val;
}

int main(void)
{
    BiTree T = NULL;
    ElemType ans;
    creatBiTree(&T);
    // ans = kthSmallest1(T, 3);
    ans = kthSmallest2(T, 3);
    printf("answer: %d\n", ans);
}