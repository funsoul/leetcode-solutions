## 题目

给定一个二叉搜索树，编写一个函数 kthSmallest 来查找其中第 k 个最小的元素。

说明：
你可以假设 k 总是有效的，1 ≤ k ≤ 二叉搜索树元素个数。

示例 1:

输入: root = [3,1,4,null,2], k = 1

       3
      / \
     1   4
      \
       2
输出: 1

示例 2:

输入: root = [5,3,6,2,4,null,null,1], k = 3

           5
          / \
         3   6
        / \
       2   4
      /
     1
输出: 3

进阶：
如果二叉搜索树经常被修改（插入/删除操作）并且你需要频繁地查找第 k 小的值，你将如何优化 kthSmallest 函数？

## 思路

1. 计算左子树元素个数left。
    - left+1 = K，则根节点即为第 K 个元素
    - left >= k, 则第 K 个元素在「左子树」中，
    - left +1 < k, 则转换为在右子树中，寻找第 K-left-1 元素
2. 二叉搜索树的中序遍历。

## 代码

### 方法1

```c
int calcTreeSize(struct TreeNode* root){  
    if (root == NULL)  
        return 0;  
    return 1 + calcTreeSize(root->left) + calcTreeSize(root->right);          
}  

int kthSmallest(struct TreeNode* root, int k){
    if (root == NULL)
        return 0;
    int leftSize = calcTreeSize(root->left);  
    if (k == leftSize + 1) {
        return root->val;
    } else if (leftSize >= k) {
        return kthSmallest(root->left, k);
    } else {
        return kthSmallest(root->right, k - leftSize - 1);
    }
}
```

### 方法2

```c
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

int kthSmallest(struct TreeNode* root, int k) {
    int val;
    int index = 1;
    kthNode(root, k, &index, &val);
    return val;
}
```