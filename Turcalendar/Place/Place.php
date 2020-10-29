<?php

namespace Turcalendar\Place;

/**
 * Представляет место (город или страну)
 */
class Place
{

    private $placeID;
    private $name;
    private $countryID;
    private $typeID;
    private $tansliterated;
    private $description;

    /**
     * Place конструктор.
     */
    public function __construct()
    {

    }

    /**
     * @param int $placeID
     */
    public function setPlaceID($placeID)
    {
        $this->placeID = $placeID;
    }

    /**
     * @return int
     */
    public function getPlaceID()
    {
        return $this->placeID;
    }

    /**
     * @param int $typeID
     */
    public function setTypeID($typeID)
    {
        $this->typeID = $typeID;
    }

    /**
     * @return int
     */
    public function getTypeID()
    {
        return $this->typeID;
    }

    /**
     * @param string $tansliterated
     */
    public function setTansliterated($tansliterated)
    {
        $this->tansliterated = $tansliterated;
    }

    /**
     * @return string
     */
    public function getTansliterated()
    {
        return $this->tansliterated;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $countryID
     */
    public function setCountryID($countryID)
    {
        $this->countryID = $countryID;
    }

    /**
     * @return int
     */
    public function getCountryID()
    {
        return $this->countryID;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

}
