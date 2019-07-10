<?php

class RandomizedSet {
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->set = [];
    }

    /**
     * Inserts a value to the set. Returns true if the set did not already contain the specified element.
     * @param Integer $val
     * @return Boolean
     */
    function insert($val) {
        if (in_array($val, $this->set)) {
            return false;
        } else {
            $this->set[] = $val;
            return true;
        }
    }

    /**
     * Removes a value from the set. Returns true if the set contained the specified element.
     * @param Integer $val
     * @return Boolean
     */
    function remove($val) {
        $key = array_search($val, $this->set);
        if ($key !== false) {
            unset($this->set[$key]);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a random element from the set.
     * @return Integer
     */
    function getRandom() {
        $key =  array_rand($this->set);
        return $this->set[$key];
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */

$set = new RandomizedSet();

$res = $set->getRandom();
var_dump($res);

$res = $set->insert(1);
var_dump($res);

$res = $set->insert(2);
var_dump($res);

$res = $set->getRandom();
var_dump($res);

$res = $set->remove(2);
var_dump($res);
