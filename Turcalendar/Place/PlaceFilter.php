<?php

namespace Turcalendar\Place;

/**
 * Фильтр, используемый в классе Turcalendar\Place\PlaceFactory
 * для поиска объектов класса Turcalendar\Place\Place (город/страна)
 */
class PlaceFilter
{
    private $query;
    private $orderField;
    private $orderType;
    private $limit = 0;
    private $start = 0;
    private $active;
    private $placeType = -1;
    const ACTIVE = 1;
    const NOT_ACTIVE = 0;
    const ASC = 'ASC';
    const DESC = 'DESC';

    /**
     * PlaceFilter конструкитор.
     */
    public function __construct()
    {

    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param string $orderField
     */
    public function setOrderField($orderField)
    {
        $this->orderField = $orderField;
    }

    /**
     * @return string
     */
    public function getOrderField()
    {
        return $this->orderField;
    }

    /**
     * @param string $orderType
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;
    }

    /**
     * @return string
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * @param int $placeType
     */
    public function setPlaceType($placeType)
    {
        $this->placeType = $placeType;
    }

    /**
     * @return int
     */
    public function getPlaceType()
    {
        return $this->placeType;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

}
