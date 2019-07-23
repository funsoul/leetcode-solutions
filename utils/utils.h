#define GET_ARRAY_LEN(array,len){len = (sizeof(array) / sizeof(array[0]));}
#define MAX(a, b, max) {max = a > b ? a : b;}
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

typedef int ElemType;
typedef struct TreeNode {
    int val;
    struct TreeNode *left;
    struct TreeNode *right;
}BiTNode, *BiTree;

void creatBiTree(BiTree *T);