<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 11/07/2016
 * Time: 21:48
 */

namespace CardGameBundle\Utils;

/**
 * Class Factory
 * @package CardGameBundle\Utils
 */
class Factory {

    /**
     * @var array
     */
    protected static $sorters = array(
        'categoryOrder' => 'CardGameBundle\Utils\CategorySort',
        'valueOrder' => 'CardGameBundle\Utils\ValueSort',
    );

    /**
     * @var SorterManager
     */
    protected static $sorterManager = null;

    /**
     * @param array $data
     * @return array
     */
    public static function sort(Array $data = array())
    {
        if (null == static::$sorterManager) {
            static::$sorterManager = new SortManager();
        }

        foreach ($data['data'] as $key => $value) {
            if (isset(static::$sorters[$key])) {
                $sorter = new static::$sorters[$key]($data['data'][$data['name']], $data['data'][$key]);
                static::$sorterManager->addSorter($sorter);
            }
        }
        return static::$sorterManager->sort();
    }
}