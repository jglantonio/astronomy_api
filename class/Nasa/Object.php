<?php
namespace Nasa;
use Api\Api\Api;
include_once ROOT.'\class\Api\Api.php';
class ObjectNasa
{
    private $api = null;
    public function __construct($startDate,$endDate)
    {
        $this->api = new Api("https://api.nasa.gov/neo/rest/v1/feed");
        $this->api->setParams([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);
    }
    public function getData()
    {
       return json_decode($this->api->send());
    }
}