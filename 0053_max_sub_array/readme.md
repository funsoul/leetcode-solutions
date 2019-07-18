## 题目

给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。

示例:

输入: [-2,1,-3,4,-1,2,1,-5,4],
输出: 6

解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。

进阶:

如果你已经实现复杂度为 O(n) 的解法，尝试使用更为精妙的分治法求解。
## 思路

1. 动态规划
    - 对数组进行遍历，当前最大连续子序列和为 sum，结果为 ans
    - 如果 sum > 0，则说明 sum 对结果有增益效果，则 sum 保留并加上当前遍历数字
    - 如果 sum <= 0，则说明 sum 对结果无增益效果，需要舍弃，则 sum 直接更新为当前遍历数字
    - 每次比较 sum 和 ans的大小，将最大值置为ans，遍历结束返回结果

2. 分治
    - 时间复杂度很高

## 代码

### 动态规划

```c
int maxSubArray(int* nums, int numsSize){
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
```

### 分治

```c
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

int maxSubArray(int* nums, int numsSize){
    return f(nums, 0, numsSize - 1);
}
```