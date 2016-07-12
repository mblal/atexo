<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 10/07/2016
 * Time: 13:46
 */

namespace CardGameBundle\Utils;

/**
 * Class CategorySort
 * @package CardGameBundle\Utils
 */
class CategorySort extends AbstractSortStrategy implements Sortable{

    /**
     * @return array
     */
    public function sort(){

        static $index = 0;

        for ($j = 0; $max = count($this->orderBy), $j < $max; $j++) {
            $category = $this->orderBy[$j];
            for ($i = $index; $count = count($this->data), $i < $count; $i++) {
                if ($this->data[$i]['category'] == $category){
                    $row = $this->data[$i];
                    unset($this->data[$i]);
                    array_unshift($this->data, $row);
                    ++$index;
                }
            }
        }
        return array_reverse($this->data);
    }
}