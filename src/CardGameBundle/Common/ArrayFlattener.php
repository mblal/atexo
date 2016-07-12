<?php
/**
 * Created by PhpStorm.
 * User: moblal
 * Date: 12/07/2016
 * Time: 01:53
 */

namespace CardGameBundle\Common;

/**
 * Classe pour applatir le tableau trié. Solution spécifique à la demande sinon j'aurais pu, à l'aide de la récursivité faire une petite fonction générique.
 * Class ArrayFlattener
 * @package CardGameBundle\Common
 */

class ArrayFlattener {

    public function flatten(array $array = array()){
        $flattenedList = array();
        foreach ($array as $sub){
            foreach ($sub as $object) {
                $flattenedList[] = $object;
            }
        }
        return $flattenedList;
    }
}