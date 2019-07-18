## 题目

给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。

示例 1:

输入: s = "anagram", t = "nagaram"
输出: true

示例 2:

输入: s = "rat", t = "car"
输出: false

说明:
你可以假设字符串只包含小写字母。

## 思路

1. 用大小为26位的数组大小存放字母出现的次数，比较s，t中字母出现的次数
2. 排序

实测发现排序的效果并不好，增加了时间复杂度

## 代码

### 方法1

```c
bool 
isAnagram(char *s, char *t) {
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
```

### 方法2

```c
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
isAnagram(char *s, char *t) {
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
```