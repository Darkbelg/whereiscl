<?php


class Concert
{
    //int
    private $date;
    //string
    private $city;
    private $country;
    private $name;
    const DATERANGE = 5;

    /**
     * Concerts constructor.
     * @param $date
     * @param $city
     * @param $country
     * @param $name
     */
    public function __construct($date, $name, $city = null, $country = null)
    {
        $this->date = $date;
        $this->city = $city;
        $this->country = $country;
        $this->name = $name;
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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

}