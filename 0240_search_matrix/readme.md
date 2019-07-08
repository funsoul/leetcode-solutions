## 题目

编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target。该矩阵具有以下特性：

每行的元素从左到右升序排列。
每列的元素从上到下升序排列。
示例:

现有矩阵 matrix 如下：

[
  [1,   4,  7, 11, 15],
  [2,   5,  8, 12, 19],
  [3,   6,  9, 16, 22],
  [10, 13, 14, 17, 24],
  [18, 21, 23, 26, 30]
]

给定 target = 5，返回 true。

给定 target = 20，返回 false。

## 思路

1. 利用``有序``条件遍历，查找目标是否在该行的``区间``（first <= target <= last）内，如果存在则遍历，否继续查找下一行。
2. 对角线查找。
    - 从左下角[ ``matrix[row][col]`` ]开始查找，令row为``最后一行``，col为``第一列``。
    - 如果target``等于``该值，返回 true 。
    - 如果target``大于``该值，由于``行有序``，所以问题变成了``比对该行的下一个值``，使``col++``。
    - 如果target``小于``该值，由于``列有序``，所以问题变成了``比对该列的上一个值``，使``row--``。
    - 当row等于0[ 第一行 ]，col等于[ 最后一列 ]时，查找结束，返回 false 。

## 代码

### 方法1

```php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix1($matrix, $target) {
        $len = count($matrix[0]);
        foreach ($matrix as $first) {
            if ($first[0] == $target || $first[$len - 1] == $target) {
                return true;
            }

            if ($first[0] < $target && $first[$len - 1] > $target) {
                for ($i = 1; $i <= $len - 2; $i++) {
                    if ($target == $first[$i]) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}
```

### 方法2

```php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix1($matrix, $target) {
        $totalRow = count($matrix);
        $totalCol = count($matrix[0]);

        $col = 0;
        $row = $totalRow - 1;
        while ($row >= 0 && $col <= $totalCol - 1) {
            if ($matrix[$row][$col] > $target) {
                $row--;
            } else if ($matrix[$row][$col] < $target) {
                $col++;
            } else {
                return true;
            }
        }

        return false;
    }
}
```