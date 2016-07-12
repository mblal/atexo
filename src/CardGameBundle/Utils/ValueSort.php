<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 10/07/2016
 * Time: 13:46
 */

namespace CardGameBundle\Utils;


class ValueSort extends AbstractSortStrategy implements Sortable
{

    public function sort()
    {

        $output = array();
        $filteredList = $this->groupByFirstCriteria();
        $filteredList = array_values($filteredList);
        for ($k = 0; $k < count($filteredList); $k++) {
            $list = $filteredList[$k];
            //$level = 0;
            for ($j = 0; $max = count($this->orderBy), $j < $max; $j++) {
                $value = $this->orderBy[$j];
                for ($i = 0; $count = count($list), $i < $count; $i++) {
                    if ($list[$i]['value'] == $value) {
                        $row = $list[$i];
                        unset($list[$i]);
                        array_unshift($list, $row);
                    }
                }
            }

            $list = array_reverse($list);
            $output[] = $list;
        }
        return $output;
    }

    /**
     * Méthode privée de création du premier filtre "category" pour appliquer la dexième strategie de tri (TRI contextuel)
     *
     * @return array
     */
    protected function groupByFirstCriteria()
    {
        $groupedList = array();
        foreach ($this->data as $key => $value) {
            $groupedList[$value['category']][] = $value;
        }
        return $groupedList;
    }
}