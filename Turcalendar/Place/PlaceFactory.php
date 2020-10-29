<?php

namespace Turcalendar\Place;

use \PDO;

/**
 * Класс для добавления/удаления/поиска города/страны, которые представлены классом Turcalendar\Place\Place.
 * Также используется класс Turcalendar\Place\PlaceFilter для поиска городов/стран
 */

class PlaceFactory
{
    /**
     * Позволяет добавлять, удалять и получать место (город или страну).
     */

    private $db;

    /**
     * PlaceFactory конструктор.
     * @param PDO $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Добавление города/страны.
     * @param Place $place
     */
    function addPlace($place)
    {
        $query = "INSERT INTO place"
            . " (name, countryID, typeID, description, tansliterated)"
            . " VALUES (:name, :countryID, :typeID, :description, :tansliterated)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $place->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':countryID', $place->getCountryID(), PDO::PARAM_INT);
        $stmt->bindParam(':typeID', $place->getTypeID(), PDO::PARAM_INT);
        $stmt->bindParam(':description', $place->getDescription(), PDO::PARAM_STR);
        $stmt->bindParam(':tansliterated', $place->getTansliterated(), PDO::PARAM_STR);
        $stmt->execute();
    }


    /**
     * Удаление города/страны
     * @param int $placeID
     */
    function removePlace($placeID)
    {
        $query = "DELETE FROM place WHERE placeID = :placeID";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':placeID', $placeID);
        $stmt->execute();
    }

    //

    /**
     * Получение списка городов/стран с помощью класса PlaceFilter,
     * в котором устанавливаются критерии отбора
     * @param PlaceFilter $placeFilter
     * @return array
     */
    public function getPlaces($placeFilter = null)
    {
        $places = array();
        $query = "SELECT * FROM place";
        if ($placeFilter != null) {
            $limit = '';
            $where = '';
            if ($placeFilter->getLimit() != 0) {
                $limit = " LIMIT :start, :limit ";
            }
            if ($placeFilter->getQuery() != '') {
                $where = '  WHERE name LIKE :query';
            }
            $query = $query . $where . $limit;
        }
        $stmt = $this->db->prepare($query);
        if ($placeFilter != null) {
            if ($placeFilter->getLimit() != 0) {
                $limit = $placeFilter->getLimit();
                $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
                $start = $placeFilter->getStart();
                $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            }
            if ($placeFilter->getQuery() != "") {
                $searchQuery = '%' . $placeFilter->getQuery() . '%';
                $stmt->bindParam(':query', $searchQuery);
            }
        }
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $place = new Place();
            $place->setPlaceID($row["placeID"]);
            $place->setTypeID($row["typeID"]);
            $place->setName($row["name"]);
            $place->setTansliterated($row["tansliterated"]);
            $place->setCountryID($row["countryID"]);
            $place->setDescription($row["description"]);
            $places[] = $place;
        }
        return $places;
    }
}
