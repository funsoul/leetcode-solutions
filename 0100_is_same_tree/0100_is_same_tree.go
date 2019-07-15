package main

import "fmt"

type TreeNode struct {
     Val int
     Left *TreeNode
     Right *TreeNode
}

func isSameTree(p *TreeNode, q *TreeNode) bool {
	if p == nil && q == nil {
		return true
	}
	if p == nil || q == nil {
		return false
	}
	if p.Val != q.Val {
		return false
	}
	return isSameTree(p.Left, q.Left) && isSameTree(p.Right, q.Right)

}

func initNode() TreeNode {
	root := TreeNode{}
	left := TreeNode{}
	right := TreeNode{}

	root.Val = 1
	left.Val = 2
	right.Val = 3

	root.Left = &left
	root.Right = &right
	return root
}

func main()  {
	p := initNode()
	q := initNode()

	res := isSameTree(&p, &q)
	fmt.Printf("%t", res)
}