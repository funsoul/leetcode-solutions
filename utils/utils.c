#include "utils.h"

void createNode(BiTree *T) {
    ElemType val;
    scanf("%d", &val);
    if (0 == val) {
        *T = NULL;
        return;
    } else {
        *T = (BiTNode *)malloc(sizeof(BiTNode));
        (*T)->val = val;
        printf("left: ");
        createNode(&(*T)->left);
        printf("right: ");
        createNode(&(*T)->right);
    }
}

/**
 * pre order init tree
 */
void creatBiTree(BiTree *T) {
    printf("\n== create bit tree [Pre Order] start ==\nroot: ");
    createNode(T);
    printf("== done ==\n\n");
}