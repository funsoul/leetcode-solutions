#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
# include <string.h>

#define GET_ARRAY_LEN(array,len){len = (sizeof(array) / sizeof(array[0]));}
#define MAX(a, b, max) {max = a > b ? a : b;}

typedef int ElemType;
typedef struct TreeNode {
    int val;
    struct TreeNode *left;
    struct TreeNode *right;
}BNode, *BTree;

void createBTree(BTree T);

void preOrderTraverse(BTree T);
void preOrderRecursionTraverse(BTree T);

void inOrderTraverse(BTree T);
void inOrderRecursionTraverse(BTree T);

void postOrderTraverse(BTree T);
void postOrderRecursionTraverse(BTree T);

void swap(void *vp1, void *vp2, int size);