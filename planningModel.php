<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 06:37 PM
 */

class planningModel
{
public $id, $name, $image_url, $date, $city,$club, $description, $created_at, $updated_at, $city_id, $club_id;

    /**
     * planningModel constructor.
     * @param $id
     * @param $name
     * @param $image_url
     * @param $date
     * @param $city
     * @param $club
     * @param $description
     * @param $created_at
     * @param $updated_at
     * @param $city_id
     * @param $club_id
     */
    public function __construct($id, $name, $image_url, $date, $city, $club, $description, $city_id, $club_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image_url = $image_url;
        $this->date = $date;
        $this->city = $city;
        $this->club = $club;
        $this->description = $description;
        $this->city_id = $city_id;
        $this->club_id = $club_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @param mixed $image_url
     */
    public function setImageUrl($image_url)
    {
        $this->image_url = $image_url;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param mixed $club
     */
    public function setClub($club)
    {
        $this->club = $club;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * @param mixed $city_id
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;
    }

    /**
     * @return mixed
     */
    public function getClubId()
    {
        return $this->club_id;
    }

    /**
     * @param mixed $club_id
     */
    public function setClubId($club_id)
    {
        $this->club_id = $club_id;
    }



}