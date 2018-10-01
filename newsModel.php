<?php
/**
 * Created by PhpStorm.
 * User: Pasistence
 * Date: 26-09-2018
 * Time: 07:35 PM
 */

class newsModel
{
public  $id, $title, $content, $image_url, $date, $club_id, $city_id, $city, $club;

    /**
     * newsModel constructor.
     * @param $id
     * @param $title
     * @param $content
     * @param $image_url
     * @param $date
     * @param $club_id
     * @param $city_id
     * @param $city
     * @param $club
     */
    public function __construct($id, $title, $content, $image_url, $date, $club_id, $city_id, $city, $club)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image_url = $image_url;
        $this->date = $date;
        $this->club_id = $club_id;
        $this->city_id = $city_id;
        $this->city = $city;
        $this->club = $club;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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



}