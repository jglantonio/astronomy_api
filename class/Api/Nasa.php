<?php
namespace Api\Nasa;
use Api\Api\Api;
include_once ROOT.'\class\Api\Api.php';
Class Nasa extends Api {
    public function __construct(){
        parent::__construct($this->url);
    }
    public function getData(){
        $data = $this->send();
        $dataArray = json_decode($data,JSON_OBJECT_AS_ARRAY);
        if(isset($dataArray['error'])){
            throw new \Exception($dataArray['error']['code']." : ".$dataArray['error']['message']);
        }
        return json_decode($data);
    }
}