#include <stdio.h>
#include <limits.h>
#include "../utils/utils.h"

int maxSubArray1(int* nums, int numsSize){
    int sum = 0, ans = nums[0];
    for (int i = 0; i < numsSize; i++)
    {
        if (sum > 0) {
            sum += nums[i];
        } else {
            sum = nums[i];
        }
        ans = sum > ans ? sum : ans;
    }
    return ans;
}

int f (int *nums, int left, int right) {
    if(left > right) return INT_MIN;
    if(left == right) return nums[left];

    int mid = (left + right) / 2;
    int l = f(nums, 0, mid - 1);
    int r = f(nums, mid + 1, right);
    int t = nums[mid];
    int max_num = nums[mid];

    for(int i = mid - 1; i >= left; i--)
    {
        t += nums[i];
        max_num = max_num > t ? max_num : t;
    }

    t = max_num;

    for(int i = mid + 1; i <= right; i++)
    {
        t += nums[i];
        max_num = max_num > t ? max_num : t;
    }
    
    max_num = l > max_num ? l : max_num;
    max_num = r > max_num ? r : max_num;

    return max_num;
}

int maxSubArray2(int* nums, int numsSize){
    return f(nums, 0, numsSize - 1);
}

int main(void)
{
    int nums[] = {-2,1,-3,4,-1,2,1,-5,4};
    int numsSize, ans;
    GET_ARRAY_LEN(nums, numsSize);
    // ans = maxSubArray1(nums, numsSize);
    ans = maxSubArray2(nums, numsSize);
    printf("%d\n", ans);
}