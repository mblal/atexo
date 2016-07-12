<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 11/07/2016
 * Time: 21:55
 */

namespace CardGameBundle\Utils;


class SortManager implements Sortable{

    /**
     * @var array
     */
    protected $sorters = array();

    /**
     * @return array
     */
    public function sort(Array $data = array())
    {
        $sortedData = array();

        if(!count($this->sorters)){
            return $sortedData;
        }

        foreach($this->sorters as $sorter){
            if(!empty($sortedData)){
                $sorter->setData($sortedData);
            }
            $sortedData = $sorter->sort();
        }

        return $sortedData;
    }

    /**
     * @param SorterInterface $sorter
     * @return $this
     */
    public function addSorter(Sortable $sorter)
    {
        $this->sorters[get_class($sorter)] = $sorter;

        return $this;
    }

    /**
     * @param SorterInterface $sorter
     * @return $this
     */
    public function removeSorter(SorterInterface $sorter)
    {
        if(isset($this->sorters[get_class($sorter)])){
            unset($this->sorters[get_class($sorter)]);
        }
        return $this;
    }
}