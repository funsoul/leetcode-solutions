## 题目

给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。

如果你最多只允许完成一笔交易（即买入和卖出一支股票），设计一个算法来计算你所能获取的最大利润。

注意你不能在买入股票前卖出股票。

示例 1:

输入: [7,1,5,3,6,4]
输出: 5
解释: 在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
     注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格。
示例 2:

输入: [7,6,4,3,1]
输出: 0
解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。

## 思路

1. 两遍循环，超时..
2. 一遍循环
    - 遍历数组
    - 找到所有价格中的最小值（借助语言相关的常量或者内置函数，初始化为当前机器位数的最大值）
    - 每一个数字减去当前最小值，得到的结果如果大于最大利润``maxProfit``，则替换当前最大利润的值
    - 遍历完，返回最大利润值。
    
## 代码

### 方法1

```php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $total = count($prices);

        $max = 0;

        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                $profit = $prices[$j] - $prices[$i];
                if ($profit > $max) {
                    $max = $profit;
                }
            }
        }

        return $max;
    }
}
```

### 方法2

```php
/**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $total = count($prices);
        $minPrice = PHP_INT_MAX;
        $maxProfit = 0;

        for ($i = 0; $i < $total; $i++) {
            if ($minPrice > $prices[$i]) {
                $minPrice = $prices[$i];
            }

            $profit = $prices[$i] - $minPrice;
            if ($profit > $maxProfit) {
                $maxProfit = $profit;
            }
        }

        return $maxProfit;
    }
}
```