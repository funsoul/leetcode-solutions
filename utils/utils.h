#define GET_ARRAY_LEN(array,len){len = (sizeof(array) / sizeof(array[0]));}
#define MAX(a, b, max) {max = a > b ? a : b;}