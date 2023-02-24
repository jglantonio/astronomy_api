<?php
namespace Nasa;
use Api\Nasa;
use PHPUnit\Logging\Exception;

class Asteroid
{
    private $nasa = null;
    private $primitiveData = null;

    private function getPrimitiveData()
    {
        return $this->primitiveData;
    }
    public function __construct($startDate,$endDate)
    {
        $this->nasa = new Nasa("https://api.nasa.gov/neo/rest/v1/feed");
        $this->nasa->setParams([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
    public function getData()
    {
        if(!$this->nasa->send()){
            $error = $this->nasa->getError();
            throw new \Exception($error->code." : ".$error->message);
        }
        return $this->nasa->getData();
    }

    public function getById($int = null,$dateFind = null){
        $dataPrimitive =  $this->getData();

        if(is_null($dataPrimitive)){
            throw new \Exception('Error : No hay datos');
        }

        var_dump($dataPrimitive);
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
        $dataPrimitive = $this->getData();
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