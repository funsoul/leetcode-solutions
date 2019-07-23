#include "utils.h"

/**
 * pre order init tree
 */
void creatBiTree(BiTree *T) {
    ElemType val;
    scanf("%d", &val);
    if (0 == val) {
        *T = NULL;
        return;
    } else {
        *T = (BiTNode *)malloc(sizeof(BiTNode));
        (*T)->val = val;
        printf("left: ");
        creatBiTree(&(*T)->left);
        printf("right: ");
        creatBiTree(&(*T)->right);
    }
}