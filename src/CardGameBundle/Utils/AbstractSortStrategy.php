<?php
/**
 * Created by PhpStorm.
 * User: Mohamed BLAL
 * Date: 10/07/2016
 * Time: 13:45
 */

namespace CardGameBundle\Utils;

/**
 * Classe Abstraite du design pattern "Strategy" pour l'implémentation des diffirentes strategies de Tri
 * Class AbstractSortStrategy
 * @package CardGameBundle\Utils
 */
class AbstractSortStrategy
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     * @var array
     */
    protected $orderBy = array();


    /**
     * @param array $data
     * @param array $orderBy
     */
    public function __construct(array $data, $orderBy)
    {
        $this->data = $data;
        $this->orderBy = $orderBy;
    }

    /**
     * @param array $orderBy
     * @return $this
     */
    public function setOrderBy(array $orderBy)
    {
        $this->orderBy = $orderBy;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}