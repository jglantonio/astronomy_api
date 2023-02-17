<?php
namespace Nasa;
use Api\Nasa;

class Asteroid
{
    private $api = null;
    private $primitiveData = null;

    private function getPrimitiveData()
    {
        return $this->primitiveData;
    }
    public function __construct($startDate,$endDate)
    {
        $this->api = new Nasa("https://api.nasa.gov/neo/rest/v1/feed");
        $this->api->setParams([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
    public function getData()
    {
        return json_decode($this->api->send());
    }

    public function getById($int = null,$dateFind = null){
        if($this->isLoaded()){
            $this->getData();
        }
        $dataPrimitive = $this->getPrimitiveData();

        if(is_null($dataPrimitive)){
            throw new \Exception('Error : No hay datos');
        }

        foreach($dataPrimitive->near_earth_objects as $date => $objectAsteroid){
            if(!is_null($dateFind) && !is_null($int)){
                if($date == $dateFind){
                    return new \Dto\Asteroid($objectAsteroid[$int]);
                }
            }else{
                if (!is_null($int)){
                    return new \Dto\Asteroid($objectAsteroid[$int]);
                }
            }
        }

        return [];
    }

    public function getAll()
    {
        if($this->isLoaded()){
            $this->getData();
        }
        $dataPrimitive = $this->getPrimitiveData();
        if(is_null($dataPrimitive)){
            throw new \Exception('Error : No hay datos');
        }

        $arrObjects = [];
        foreach($dataPrimitive->near_earth_objects as $date => $objectAsteroid){
            foreach($objectAsteroid as $object){
                $arrObjects[] = new \Dto\Asteroid($object);
            }
        }
        return $arrObjects;
    }

    private function isLoaded()
    {
        return !is_null($this->primitiveData);
    }

}