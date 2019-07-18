#include <stdio.h>
#include <stdbool.h>
#include <string.h>

bool 
isAnagram1(char *s, char *t) {
    int sLen = strlen(s);
    if(sLen != strlen(t)) 
        return false;

    int x[26]={0};
    int y[26]={0};
    for(int i = 0; i < sLen; i++) {
        x[s[i] - 'a']++;
        y[t[i] - 'a']++;
    }
    for(int i = 0; i < 26; i++) {
        if(x[i] != y[i])
            return false;
    }
    return true;
}

void quiksort(char *a,int low,int high)
{
    int i = low;
    int j = high;  
    char temp = a[i]; 
  
    if( low > high)
    {          
       return ;
    }
    while(i < j) 
        {
            while((a[j] >= temp) && (i < j))
            { 
                j--; 
            }
            a[i] = a[j];
            while((a[i] <= temp) && (i < j))
            {
                i++; 
            }  
            a[j]= a[i];
        }
     a[i] = temp;
     quiksort(a,low,i-1);
     quiksort(a,j+1,high);
}

bool 
isAnagram2(char *s, char *t) {
    int sLen = strlen(s);
    int tLen = strlen(t);
    if(sLen != tLen) 
        return false;

    quiksort(s, 0, sLen - 1);
    quiksort(t, 0, tLen - 1);

    for(int i = 0; i < sLen; i++) {
        if(s[i] != t[i])
            return false;
    }
    return true;
}

int 
main(void) {
    char s[4] = "abc";
    char t[4] = "abc";

    // printf("%s\n", isAnagram1(s, t) ? "true" : "false");
    printf("%s\n", isAnagram2(s, t) ? "true" : "false");

    return 0;
}