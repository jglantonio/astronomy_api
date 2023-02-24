<?php

namespace Dto;

class Asteroid
{
    private $id = null;
    private $link = null;
    private $neo_reference_id = null;
    private $name = null;
    private $nasa_jpl_url = null;
    private $absolute_magintude_h = null;
    private $estimated_diameter = null;
    private $close_approach_data = null;
    private $is_potentially_hazardous_asteroid = null;
    private $is_sentry_object = null;

    public function __construct($data)
    {
        $this->id = $data->id;
        if(isset($data->link)){
            $this->link = $data->link;
        }
        $this->neo_reference_id = $data->neo_reference_id;
        $this->name = $data->name;
        $this->nasa_jpl_url = $data->nasa_jpl_url;
        if(isset($data->absolute_magintude_h)){
            $this->absolute_magintude_h = $data->absolute_magintude_h;
        }
        $this->estimated_diameter = $data->estimated_diameter;
        $this->close_approach_data = $data->close_approach_data;
        $this->is_potentially_hazardous_asteroid = $data->is_potentially_hazardous_asteroid;
        $this->is_sentry_object = $data->is_sentry_object;
    }

    /**
     * @return null
     */
    public function getEstimatedDiameter($magnitude)
    {
        if(!$this->validMaginitude($magnitude)){
            throw new \Exception('Maginutdes : kilometers , meters , feets');
        }
        return $this->estimated_diameter->$magnitude;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return null
     */
    public function getNeoReferenceId()
    {
        return $this->neo_reference_id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getNasaJplUrl()
    {
        return $this->nasa_jpl_url;
    }

    /**
     * @return null
     */
    public function getAbsoluteMagintudeH()
    {
        return $this->absolute_magintude_h;
    }

    /**
     * @return null
     */
    public function getCloseApproachData()
    {
        return $this->close_approach_data;
    }

    /**
     * @return null
     */
    public function getIsPotentiallyHazardousAsteroid()
    {
        return $this->is_potentially_hazardous_asteroid;
    }

    /**
     * @return null
     */
    public function getIsSentryObject()
    {
        return $this->is_sentry_object;
    }


    private function validMaginitude($magnitude)
    {
        switch ($magnitude){
            case 'feet' : return true;
            case 'miles' : return true;
            case 'meters' : return true;
            case 'kilometers' : return true;
        }
        return false;
    }

}