#include "utils.h"

void createBNode(BTree T) {
    ElemType val;
    scanf("%d", &val);
    if (0 == val) {
        T = NULL;
        return;
    } else {
        T = (BNode *)malloc(sizeof(BNode));
        T->val = val;
        printf("parent %d's left: ", val);
        createBNode(T->left);
        printf("parent %d's right: ", val);
        createBNode(T->right);
    }
}

/**
 * pre order init tree
 */
void createBTree(BTree T) {
    printf("\n== create bit tree [Pre Order] start (0: NULL) ==\nroot: ");
    createBNode(T);
    printf("== done ==\n\n");
}

void preOrderRecursionTraverse(BTree T) {
    if (T != NULL) {
        printf("%d ", T->val);
        preOrderRecursionTraverse(T->left);
        preOrderRecursionTraverse(T->right);
    }
}

void inOrderRecursionTraverse(BTree T) {
    if (T != NULL) {
        inOrderRecursionTraverse(T->left);
        printf("%d ", T->val);
        inOrderRecursionTraverse(T->right);
    }
}

void postOrderRecursionTraverse(BTree T) {
    if (T != NULL) {
        postOrderRecursionTraverse(T->left);
        postOrderRecursionTraverse(T->right);
        printf("%d ", T->val);
    }
}