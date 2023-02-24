<?php
namespace Api;
use Api\Api;
Class Nasa extends Api {
    public function __construct($url){
        parent::__construct($url);
        $this->setKey(API_KEY_NASA);
    }
    public function getData(){
        $data = $this->send();
        if(!$data){
            return false;
        }
        return $data;
    }
}